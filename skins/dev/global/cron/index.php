<?php

namespace {

    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 600); // 10m

    use MD\Helpers\App;
    use MD\Helpers\Config;
    use MD\Models\CronResult;

    require_once dirname(dirname(__DIR__)) .'/vendor/autoload.php';

    Config::init(dirname(dirname(dirname($_SERVER['SCRIPT_FILENAME']))), ['useSession' => false]);

    //Config::init();
    $config = Config::getInstance();
    $app = App::getInstance();
    $cronResult = new CronResult();
    $cronResult->setPartnerId($config->partnerId);
    $cronResult->setStartDate(new \DateTime());

    $starMicroTime = microtime(true);

    $app->callCronFunction($cronResult, 'PaymentSystems');
    $app->callCronFunction($cronResult, 'Players');
    $app->callCronFunction($cronResult, 'PlayersActivityMain');
    $app->callCronFunction($cronResult, 'PlayersActivityCasino');
    $app->callCronFunction($cronResult, 'PlayersCasinoBonus');
    $app->callCronFunction($cronResult, 'PlayersExpenseMain');
    $app->callCronFunction($cronResult, 'BannerStat');

    $date = new \DateTime('-1 days'); $date->setTime(10,0,0);
    $app->callCronFunction($cronResult, 'calculateCommission', 'MD\Services\CoreService', ['date' => $date], '');


    $executionTime = microtime(true) - $starMicroTime;
    $cronResult->setExecutionTime($executionTime);

    $app->call('MD\DAO\CronResult', 'saveCronResult', ['cronResult' => $cronResult]);

}