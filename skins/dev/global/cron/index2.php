<?php

namespace {

    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 600); // 10m

    use MD\Helpers\App;
    use MD\Helpers\Config;
    use MD\Helpers\Scheduling;
    use MD\Helpers\SoapClient;

    require_once dirname(dirname(__DIR__)) .'/vendor/autoload.php';

//    Config::init(dirname(dirname(dirname($_SERVER['SCRIPT_FILENAME']))), ['useSession' => false]);

    Config::init();
    $config = Config::getInstance();
    $app = App::getInstance();

    /*$tasks = range(1, 2500);
    $res = Scheduling::schedulingTasksFroMinTimeRang($tasks, 303, 10);
    var_dump($res);*/


    $param = [
        'syncDate'  => '2015-07-13T00:00:00',
        'partnerId' => 4
    ];
    //GetAffiliatesReport

    $result = SoapClient::send('GetAffiliatesReport', $param);
    var_dump($result);
/*
Id Kind Name

1 LiveGames Live Games
2 VirtualGames Virtual Games
3 SkillGames Skill Games
4 BettingGames Betting Games
5 Pool Betting Games Pool Betting Games
6 Slots Slots
*/

}
/*
'USD', 4      // Vbet
'EUR', 10     // VictoryRoom
'USD', 15     // Bwinner365
'TRY', 16     // 90dakika
'BRL', 20     // Betmais
'KRW', 24     // Good365
'USD', 29     // 5plusbet
'USD', 35     // Profitbet
'USD', 36     // Privatbet
'USD', 43     // MarsBet
'USD', 50     // BizonBet
'USD', 55     // Exbinog
'VEF', 61     // Elcasinocaribe
'USD', 68     // 777-ace
'TRY', 81     // BetSat
'EUR', 85     // 2winbet
'TRY', 89     // JustinPartners
'EUR', 102    // Ibetup
'EUR', 107    // Betkurus
'TRY', 112    // BexBet
'EUR', 113    // BidLuck
'TRY', 114    // Cashago
'TRY', 115    // TakTikBet
'NGN', 126    // EbonyBet
'USD', 136    // BetSahara  CasinoSahara
'TRY', 137    // WinTime
'EUR', 138    // BetBoro
'EUR', 147    // BBet
'KRW', 148    // Eurostar
'EUR', 169    // Villabet
'USD', 175    // Paraisobet
'EUR', 194    // Bet52


CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2013,	11);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2013,	12);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	1);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	2);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	3);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	4);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	5);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	6);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	7);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	8);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	9);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	10);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	11);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2014,	12);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2015,	2);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(4,  'USD',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2013,	7);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2013,	8);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2013,	9);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2013,	10);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2013,	12);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2014,	1);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2014,	2);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2014,	5);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2014,	6);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2014,	7);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2014,	8);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2014,	9);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2014,	10);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2014,	11);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2014,	12);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(15, 'USD',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2014,	5);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2014,	6);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2014,	7);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2014,	8);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2014,	9);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2014,	10);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2014,	11);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2014,	12);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2015,	2);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(20, 'BRL',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2014,	10);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2014,	11);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2014,	12);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2015,	2);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(24, 'KRW',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2014,	6);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2014,	7);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2014,	8);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2014,	9);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2014,	10);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2014,	11);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2014,	12);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2015,	2);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(29, 'USD',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2014,	7);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2014,	8);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2014,	9);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2014,	11);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2014,	12);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2015,	2);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(36, 'USD',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2014,	7);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2014,	8);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2014,	9);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2014,	10);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2014,	11);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2014,	12);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2015,	2);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(43, 'USD',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	1);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	2);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	3);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	4);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	5);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	6);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	7);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	8);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	9);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	10);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	11);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2014,	12);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2015,	2);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(50, 'USD',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2014,	8);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2014,	9);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2014,	10);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2014,	11);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2014,	12);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2015,	2);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(55, 'USD',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(68, 'USD',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(68, 'USD',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2014,	8);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2014,	11);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2014,	12);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2015,	1);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2015,	2);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(81, 'TRY',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(102,'EUR',	2015,	3);
CALL calculateAffiliatesPlayersNetworkIncome(102,'EUR',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(102,'EUR',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(102,'EUR',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(102,'EUR',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(102,'EUR',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(107,'EUR',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(107,'EUR',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(107,'EUR',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(107,'EUR',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(107,'EUR',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(114,'TRY',	2015,	4);
CALL calculateAffiliatesPlayersNetworkIncome(114,'TRY',	2015,	5);
CALL calculateAffiliatesPlayersNetworkIncome(114,'TRY',	2015,	6);
CALL calculateAffiliatesPlayersNetworkIncome(114,'TRY',	2015,	7);
CALL calculateAffiliatesPlayersNetworkIncome(114,'TRY',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(115,'TRY',	2015,	8);
CALL calculateAffiliatesPlayersNetworkIncome(169,'EUR',	2015,	8);

*/