<?php
use MD\Helpers\App;
use MD\Helpers\Config;
use MD\Helpers\Template;

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

Config::init(__DIR__, ['template' => 'front']);
App::redirectHandler();
Template::init();