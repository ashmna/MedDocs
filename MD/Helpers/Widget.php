<?php


namespace MD\Helpers;


class Widget {
    public static function show ($widgetName, $package = '') {
        $globalDir   = Config::getGlobalDir();
        $skinRootDir = Config::getSkinRootDir();
        $package     = trim($package, '//');
        $widgetName  = trim($widgetName, '//');
        if(!empty($package)) {
            $widgetName = DIRECTORY_SEPARATOR.$package.DIRECTORY_SEPARATOR.$widgetName;
        } else {
            $widgetName = DIRECTORY_SEPARATOR.$widgetName;
        }
        $path = $globalDir.DIRECTORY_SEPARATOR.'widgets'.$widgetName.'.php';
        $skinPath = $skinRootDir.DIRECTORY_SEPARATOR.'partials'.DIRECTORY_SEPARATOR.'widgets'.$widgetName.'.php';
        if(file_exists($skinPath)) {
            include $skinPath;
        } elseif(file_exists($path)) {
            include $path;
        } else {
            Notification::error(1, $widgetName.' Not found! ' ,'Widget');
        }
    }


}