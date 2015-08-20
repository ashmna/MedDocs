<?php
use MD\Helpers\App;
use MD\Helpers\Config;
use MD\Helpers\Template;

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

Config::init();
App::redirectHandler();
Template::init();