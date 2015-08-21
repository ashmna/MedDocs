<?php


namespace MD\Helpers;


//use MD\Models\Token;

class Template {
    private static $globalTemplateDir;
    private static $skinTemplateDir;
    private static $templateDir;

    private static $top = 'top';
    private static $footer = 'footer';


    private static function dir($skin = false) {
        if(!isset(self::$templateDir)) {
            $config = Config::getInstance();
            self::$templateDir = DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.$config->template.DIRECTORY_SEPARATOR;

            self::$globalTemplateDir = Config::getGlobalDir().self::$templateDir;
            self::$skinTemplateDir = Config::getSkinRootDir().self::$templateDir;
            if(!file_exists(self::$globalTemplateDir) && !file_exists(self::$skinTemplateDir)) {
                die('Template "'.$config->template.'" Not found!');
            }
        }
        return $skin ? self::$skinTemplateDir : self::$globalTemplateDir;
    }

    public static function init() {
        self::header();
        $page = App::getCurrentPage();

        self::top();
        self::page($page);
        self::footer();
    }

    private function header() {
        self::file('header.php');
    }

    private function top() {
        if(isset(self::$top)) self::file(self::$top.'.php');
    }

    private function footer() {
        if(isset(self::$footer)) self::file(self::$footer.'.php');
    }

    public static function page($page) {
        self::file('pages'.DIRECTORY_SEPARATOR.$page.'.php');
    }

    public static function file($file) {
        $skinPath   = self::dir(true).$file;
        $globalPath = self::dir().$file;

        if(file_exists($skinPath)) {
            return include $skinPath;
        } elseif(file_exists($globalPath)) {
            return include $globalPath;
        } else {
            Notification::error(1, 'file "'.$file.'" Not found! ', 'Template');
        }
    }


}