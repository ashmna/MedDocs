<?php
use MD\Helpers\App;
use MD\Helpers\Config;
use MD\Helpers\Template;

require_once dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';

Config::init(dirname(__DIR__));
App::redirectHandler();
Template::init();