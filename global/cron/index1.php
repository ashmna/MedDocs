<?php

namespace {

    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 600); // 10m

    use MD\Helpers\App;
    use MD\Helpers\Config;
//die;
    require_once dirname(dirname(__DIR__)) .'/vendor/autoload.php';

//    Config::init(dirname(dirname(dirname($_SERVER['SCRIPT_FILENAME']))), ['useSession' => false]);

    Config::init('', [
        'definition' => [
//            'partner.id'       => 102,
//            'partner.currency' => 'EUR',
        ]
    ]);
//    4     +  e-     -
//    10    +  e-     -
//    29    +  e-     -
//    81    +  e-     -
//    107   +  e+     -
//    112   +  e-     -
//    113   +  e-     -
//    114   +  e-     -
//    115   +  e-     -
//    126   +  e-     -
//    136   +  e+     -
//    138   +  e-     -
//    148   +  e+     -
//    169   +  e+     -


    $config = Config::getInstance();
    $app = App::getInstance();

    $fromDate = new \DateTime('2015-08-19 10:00:00');
    $toDate   = new \DateTime('2015-08-19 10:00:00');

    /** @var \MD\Services\PusherService $pusherService */
    $pusherService = $app->container->get('MD\Services\PusherService');
    /** @var \MD\Services\CoreService $coreService */
    $coreService = $app->container->get('MD\Services\CoreService');
    $interval = new \DateInterval('P1D');
    $toDate->modify('+1 day');
    $dateRange = new \DatePeriod($fromDate, $interval ,$toDate);
    $start = microtime(true);
    foreach($dateRange as $date) {
        $scopeStart = microtime(true);
        /** @var $date \DateTime */
        $date->setTime(10, 0, 0);
        $newFromDate = clone $date;
        $newToDate   = clone $date;
        $newToDate->modify('+1 day');

        $pusherService->setDateRange($newFromDate, $newToDate);


        $pusherService->pushPaymentSystems();
//        $pusherService->pushCurrencies();
        $pusherService->pushPlayers();
        $pusherService->pushPlayersActivityMain();
        $pusherService->pushPlayersActivityCasino();
//        $pusherService->pushPlayersCasinoBonus();
//        $pusherService->pushPlayersExpenseMain();
        $pusherService->pushBannerStat();



        $coreService->calculateCommission($date);

        $scopeEnd = microtime(true);
        $scopeTime = $scopeEnd - $scopeStart;
        $scopeTime = round($scopeTime, 2);
        echo $config->partnerId.'   ';
        echo $date->format('Y-m-d H:i:s');
        echo " OK $scopeTime ms \n<br>";
    }
    $end = microtime(true);
    $time = $end - $start;
    echo "\n <br> ".$time.' ms ';
}