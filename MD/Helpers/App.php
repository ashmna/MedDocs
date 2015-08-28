<?php

namespace MD\Helpers;




use A7\A7;
use A7\ReflectionUtils;
use MD\Exceptions\UndefinedMethodException;

//use MD\Models\Affiliate;
//use MD\Models\CronResult;

class App {
    /** @var App */
    protected static $instance;
    protected static $phpWarning = [
        E_WARNING,
        E_CORE_WARNING,
        E_COMPILE_WARNING,
        E_USER_WARNING,
        E_NOTICE,
        E_USER_NOTICE,
    ];
    protected static $session;
    protected static $page;


    protected $builder;
    /**
     * @var \A7\A7
     */
    public $container;

    protected function  __construct() {
    }

    /**
     * @return App
     */
    public static function getInstance() {
        if(!isset(static::$instance)) {
            static::$instance = new self();
            static::$instance->init();
        }
        return static::$instance;
    }


    protected function init() {
        $config = Config::getInstance();
        if($config->useSession) {
//            $secure = isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https';
//            session_set_cookie_params(604800, '/', '.'.Config::getInstance()->partnerDomain, $secure);
            session_start();
        }
        set_error_handler(['MD\Helpers\App','errorHandler']);
        $this->container = new A7();
        $this->container->enablePostProcessor('DependencyInjection', $config->definition);
//        $this->container->enablePostProcessor('Logger', ['path' => 'D:\affiliates.log']);
    }

    public function callFromRequest(array $arguments = []) {
        $classData  = self::getClassNameAndMethodFromURI();
        $className  = str_replace('-', '', $classData['className']);
        $methodName = str_replace('-', '', $classData['methodName']);
        if(empty($className)) {
            throw new \Exception('empty class name');
        }
        if(empty($methodName)) {
            throw new \Exception('empty method name');
        }
        $className = 'MD\Services\\'.ucfirst($className).'Service';

        return $this->call($className, $methodName, $arguments);
    }

    protected static function getClassNameAndMethodFromURI($apiPrefix = 'api/') {
        $retData = [
            'className'  => '',
            'methodName' => '',
        ];
        $requestURI = $_SERVER['REQUEST_URI'];
        $pos = strpos($requestURI, $apiPrefix);
        if($pos !== false) {
            $requestURI = substr($requestURI, $pos+strlen($apiPrefix));
            $parsData = explode('/', $requestURI);
            if(count($parsData) > 0) {
                $retData['className'] = $parsData[0];
            }
            if(count($parsData) > 1) {
                $retData['methodName'] = $parsData[1];
            }
        }
        return $retData;
    }

    public function call($className, $methodName, array $arguments = []) {
        $class = $this->container->get($className);
        if(A7::methodExists($class, $methodName)) {
            $reflectorMethod = ReflectionUtils::getInstance()->getMethodReflection($className, $methodName);
            foreach ($reflectorMethod->getParameters() as $param) {
                if(isset($arguments[$param->name])) {
                    $paramRefClass = $param->getClass();
                    if($paramRefClass instanceof \ReflectionClass) {
                        $parentClass = $paramRefClass->getParentClass();
                        if($parentClass && $parentClass->name == 'MD\Helpers\Model') {
                            if(!$arguments[$param->name] instanceof Model) {
                                $arguments[$param->name] = new $paramRefClass->name($arguments[$param->name]);
                            }
                        } elseif($paramRefClass->name == 'DateTime') {
                            if(!$arguments[$param->name] instanceof \DateTime) {
                                $arguments[$param->name] = new \DateTime($arguments[$param->name]);
                            }
                        }
                    }
                }
            }
        } else {
            throw new UndefinedMethodException();
        }

        return $this->container->call($class, $methodName, $arguments);
    }


//    public function callCronFunction(CronResult $cronResult, $pusherName, $className = 'MD\Services\PusherService', array $arguments = [], $functionPrefix = 'push') {
//        $config = Config::getInstance();
//        if($config->checkCronName($pusherName)) {
//            /** @var \MD\Helpers\DB $db */
//            $db = $this->container->get('MD\Helpers\DB');
//            $db->beginTransaction();
//            $functionName = $functionPrefix.$pusherName;
//            try {
//                if($this->call($className, $functionName, $arguments)) {
//                    $db->commit();
//                    call_user_func([$cronResult, 'set'.$pusherName], CronResult::OK);
//                } else {
//                    $db->rollback();
//                    call_user_func([$cronResult, 'set'.$pusherName], CronResult::NOK);
//                }
//            } catch(\Exception $e) {
//                $db->rollback();
//                call_user_func([$cronResult, 'set'.$pusherName], CronResult::NOK);
//            }
//        }
//    }

    public static function exceptionHandler(\Exception $exception) {
        if(Config::getInstance()->environment != 'development') return;
        $content = $exception->getMessage()."\n file ".$exception->getFile()." line ".$exception->getLine();
        Notification::error(1, $content, 'php_exception');
    }

    public static function errorHandler($errno, $errstr, $errfile, $errline) {
        if(Config::getInstance()->environment != 'development') return;

        if($errno == E_STRICT) return;

        $content = $errstr."\n file ".$errfile." line ".$errline;

        if(in_array($errno, self::$phpWarning)) {
            Notification::warning(1, $content, 'php_warning');
        } else {
            Notification::error(1, $content, 'php_error');
        }
    }

    public static function getCurrentPage() {
        $page = 'index';
        if(isset(self::$page)) {
            $page = self::$page;
        } elseif(isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        self::$page = $page;
        return $page;
    }

    public static function setCurrentPage($page) {
        self::$page = $page;
    }

    public static function getCounterNextIndex($counterName) {
        $app = self::getInstance();
        /** @var \MD\DAO\Counter $counterDAO */
        $counterDAO = $app->container->get('MD\DAO\Counter');
        return $counterDAO->getNextIndex($counterName);
    }

    /*************** USER ***************/
    /**
     * @return Session
     */
    public static function getSession() {
        if(!isset(self::$session)) {
            self::$session = new Session();
        }
        return self::$session;
    }

    /**
     * @return bool
     * @throws \MD\Exceptions\ConfigurationException
     */
    public static function isLoggedUser() {
        $config = Config::getInstance();
        if($config->test) return true;
        $session = self::getSession();
        return isset($session->isLogged) ? $session->isLogged : false;
    }

    public static function getUserRole() {
//        if(self::isLoggedUser()) {
//            $affiliate = self::getCurrentUser();
//            if(isset($affiliate) && isset($affiliate->role)) {
//                $role = $affiliate->role;
//            }
//        }
//        return $role;
        return Defines::ROLE_ADMIN;
    }

    public static function redirectHandler() {
        Template::file('redirect.php');
    }


    public static function getLocale() {
//        $session = self::getSession();
//        $config = Config::getInstance();
//        $locale = $config->getCurrentLocale();
//        if(self::isLoggedUser()) {
//            $user = self::getCurrentUser();
//            if(!empty($user->locale)) {
//                $locale = $user->locale;
//            }
//        }
//        elseif(isset($session->language)) {
//            $locale = $session->language;
//        }
//        elseif($config->useSession && isset($_COOKIE['languageCode'])) {
//            $locale = $_COOKIE['languageCode'];
//        }
//        return $locale;
    }

    /*************** COMMON DATA ***************/



    public static function getDictionaryKeyIdByName($name) {
//        $app = self::getInstance();
//        /** @var \MD\DAO\Dictionary $commonFunctions */
//        $commonFunctions = $app->container->get('MD\DAO\Dictionary');
//        $dictionaryKeys = $commonFunctions->getDictionaryKeys();
//        return array_search($name, $dictionaryKeys);
    }

}