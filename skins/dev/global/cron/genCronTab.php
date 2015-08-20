<?php



namespace {

    use MD\Helpers\Scheduling;

    require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

    $skinsDirPath = '/usr/share/nginx/html/affiliates/skins';


    $byTimeZone = Scheduling::getByTimeZone($skinsDirPath);

    $allTasks = [] ;
    foreach($byTimeZone as $timeZone) {
        foreach($timeZone as $row) {
            $allTasks[] = 'php '.$row.'/global/cron/index.php';
        }
    }

    $schedulingData = Scheduling::schedulingTasksFroMinTimeRang($allTasks, 60, 2);
    $cronContext = Scheduling::generateCronContext('10:45', $schedulingData);


    $crontab = shell_exec('crontab -l');
    $pattern = '/#AffiliateScheduling\[START\].*#AffiliateScheduling\[END\]/s';
    $cronContext = "#AffiliateScheduling[START]\n$cronContext\n#AffiliateScheduling[END]";
    $crontab = preg_replace($pattern, $cronContext, $crontab);

    file_put_contents('/tmp/crontab.txt', $crontab);
    exec('crontab /tmp/crontab.txt');


}























