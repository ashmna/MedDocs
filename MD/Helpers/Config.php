<?php

namespace MD\Helpers;


use MD\Exceptions\ConfigurationException;
/**
 * Class Config
 * @package MD\Helpers
 *
 * @property bool $test
 * @property array $definition
 * @property int $partnerId
 * @property string $partnerName
 * @property string $partnerEmail
 * @property bool $useSession
 * @property string $dateFormat
 * @property string $dateTimeFormat
 * @property string $currentLocale
 * @property string $template
 * @property string $environment
 * @property array $languages
 * @property string $timezone
 */
class Config {
    use GetterSetter;

    /** @var Config  */
    protected static $instance = null;
    protected $test = false;
    protected static $rootDir;
    protected static $skinRootDir;
    protected $useSession = true;

    protected $email;
    protected $definition = [];
    protected $partnerId;
    protected $timezone;
    protected $dateFormat = 'd.m.Y';
    protected $dateTimeFormat = 'd.m.Y H:i';
    protected $currentLocale = "en_GB";
    protected $template = 'main';
    protected $environment = 'development';
    protected $languages = [];
    protected $languagesCode;



    /**
     * @return Config
     * @throws ConfigurationException
     */
    public static function getInstance() {
        if(!isset(static::$instance)) {
            throw new ConfigurationException('Configuration not initialized');
        }
        return static::$instance;
    }

    protected function __construct($config) {
        foreach($config as $key=>$value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
        $this->initDefaultTimezone();
    }

    public static function init($skinDir='', array $params = []) {
        if(empty($skinDir) && !empty($_SERVER['DOCUMENT_ROOT'])) {
            $skinDir = $_SERVER['DOCUMENT_ROOT'];
        }
        $globalConfig = [];
        self::$rootDir = dirname(dirname(__DIR__));
        $globalConfigPath = self::$rootDir.DIRECTORY_SEPARATOR.'config.php';
        if($skinDir == 'test') { // only for test , delete on realise
            $globalConfigPath = self::$rootDir.DIRECTORY_SEPARATOR.'test_config.php';
        }
        if(file_exists($globalConfigPath)) {
            $globalConfig = require $globalConfigPath;
            if(!is_array($globalConfig)) {
                $globalConfig = [];
            }
        }
        $skinConfig = [];
        $skinConfigPath = $skinDir.DIRECTORY_SEPARATOR.'config.php';
        if(file_exists($skinConfigPath)) {
            $skinConfig = require $skinConfigPath;
            if(!is_array($skinConfig)) {
                $skinConfig = [];
            }
        }

        self::$skinRootDir = $skinDir;
        if(empty(self::$skinRootDir)) { // for test
            self::$skinRootDir = __DIR__;
        }
        if($skinDir == 'test') { // only for test , delete on realise
            self::$skinRootDir = self::$rootDir.'/skins/test';
        }
        $config = $globalConfig;
        if(!empty($params)) {
            $skinConfig = array_replace_recursive($skinConfig, $params);
        }
        if(!empty($skinConfig)) {
            $config = array_replace_recursive($globalConfig, $skinConfig);
        }
        static::$instance = new static($config);
        App::getInstance();
//        self::$instance->initLocale();
//        self::$instance->initReferralId();
    }

    public function setUseSession($useSession) {
        $this->useSession = $useSession;
    }

    public function getDefinition() {
        if(!is_array($this->definition)) {
            $this->definition = [];
        }
        return $this->definition;
    }

    public function getPartnerId() {
        if(!empty($this->definition) && !empty($this->definition['partner.id'])) {
            return $this->definition['partner.id'];
        } else {
            throw new ConfigurationException("Configuration definition['partner.id'] not found !!!");
        }
    }

    public function getPartnerName() {
        if(!empty($this->definition) && !empty($this->definition['partner.name'])) {
            return $this->definition['partner.name'];
        } else {
            throw new ConfigurationException("Configuration definition['partner.name'] not found !!!");
        }
    }

    public function getPartnerEmail() {
        if(!empty($this->definition) && !empty($this->definition['partner.email'])) {
            return $this->definition['partner.email'];
        } else {
            throw new ConfigurationException("Configuration definition['partner.email'] not found !!!");
        }
    }


    public function getTimezone() {
        return $this->timezone;
    }



    public static function getGlobalDir() {
        return self::$rootDir.'/global';
    }

    public static function getSkinRootDir() {
        return self::$skinRootDir;
    }

    private function initDefaultTimezone() {
        if(!empty($this->timezone)) {
            date_default_timezone_set($this->timezone);
        }
    }

    public function initLocale() {
//        $directory = self::getGlobalDir().'/locale';
//        $domain = 'main';
//
//        $localeCode = App::getLocale();
//
//        $locale=$this->languagesCode[$localeCode];
//
//        if($this->useSession) {
//            setcookie("languageCode", $localeCode, 0, '/');
//            setcookie("language", $locale, 0, '/');
//        }
//
//        putenv("LANG=".$localeCode);
//        setlocale(LC_ALL, $localeCode);
//
//        if ($localeCode == 'tr_TR') {
//            setlocale(LC_CTYPE,'en_GB');
//        }
//
//        bindtextdomain($domain, $directory);
//        textdomain($domain);
//        bind_textdomain_codeset($domain, 'UTF-8');
    }

    public function initReferralId() {
//        if($this->useSession) {
//            if(isset($_GET['referralId'])) {
//                $parentAffiliateId = abs(intval($_GET['referralId']));
//                if(isset($this->definition['referralIdLifeTime'])) {
//                    $referralIdLifeTime = $this->definition['referralIdLifeTime'];
//                    setcookie("parentAffiliateId", $parentAffiliateId, time() + $referralIdLifeTime, '/');
//                }
//            }
//        }
    }

    public function getTest() {
        return !empty($this->test);
    }


    public function getUseSession() {
        return $this->test ? false : $this->useSession;
    }

    public function getCurrentLocale() {
        return $this->currentLocale;
    }

    public function setCurrentLocale($currentLocale) {
        $this->currentLocale = $currentLocale;
    }

    public function getTemplate() {
        return $this->template;
    }

    public function getEnvironment() {
        return $this->environment;
    }

    public function getDateFormat() {
        return $this->dateFormat;
    }

    public function getDateTimeFormat() {
        return $this->dateTimeFormat;
    }

    public function getLanguages() {
        return $this->languages;
    }

    public function email($configName = '') {
        $path = explode('.', $configName);
        if(!is_array($path)) $path = [$configName];
        $res = $this->email;
        foreach($path as $key) {
            if(isset($res[$key])) {
                $res = $res[$key];
            } else {
                $res = null;
                break;
            }
        }
        return $res;
    }

}