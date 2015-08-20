<?php
require_once dirname(dirname(__DIR__)) .'/vendor/autoload.php';

use MD\Helpers\Config;
use MD\Models\AjaxRequest;

ob_start();

header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');


if(!empty($_SERVER['HTTP_REFERER'])) {
    $parsedURL = parse_url($_SERVER['HTTP_REFERER']);
    $port = isset($parsedURL['port']) ? ':'.$parsedURL['port'] : '';
    header('Access-Control-Allow-Origin: ' . $parsedURL['scheme'] . '://' . $parsedURL['host'].$port);
}


Config::init();

$ajaxResponse = AjaxRequest::getInstance()->getResponse();
$ajaxResponse->html = ob_get_contents();
ob_end_clean();
$ajaxResponse->printJSON();