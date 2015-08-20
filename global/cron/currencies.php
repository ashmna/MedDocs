<?php
namespace {


    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 600); // 10m

    use MD\Helpers\App;
    use MD\Helpers\Config;
    use MD\Models\CronResult;

    require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

    Config::init( 'cron', [
        'definition' => [
            'partner.id'       => -1,
            'partner.name'     => '',
            'partner.currency' => 'AMD'
        ],
        'useSession' => false
    ]);

    //Config::init();
    $config = Config::getInstance();
    $app    = App::getInstance();
    $cronResult = new CronResult();
    $cronResult->setPartnerId($config->partnerId);
    $cronResult->setStartDate(new \DateTime());

    $starMicroTime = microtime(true);


    $app->callCronFunction($cronResult, 'Currencies');



    $executionTime = microtime(true) - $starMicroTime;
    $cronResult->setExecutionTime($executionTime);

    $app->call('MD\DAO\CronResult', 'saveCronResult', ['cronResult' => $cronResult]);
}