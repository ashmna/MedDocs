<?php


namespace MD\Helpers;


class Scheduling {


    public static function getByTimeZone($skinsDirPath) {
        $byTimeZone = [];

        $d = dir($skinsDirPath);
        while (false !== ($skinDirName = $d->read())) {
            if ($skinDirName == '.' || $skinDirName == '..') continue;

            $currentSkinPath = $skinsDirPath . DIRECTORY_SEPARATOR . $skinDirName;
            Config::init($currentSkinPath);
            $config = Config::getInstance();

            $timezone = $config->timezone;

            if(!isset($byTimeZone[$timezone])) {
                $byTimeZone[$timezone] = [];
            }

            $byTimeZone[$timezone][] = $currentSkinPath;

        }
        $d->close();

        return $byTimeZone;
    }

    public static function schedulingTasksFroMinTimeRang(array $tasks, $minTimeRange, $maxInterval) {
        $count = count($tasks);

        if(($maxInterval * $count) > $minTimeRange) {
            $repeat = 0;
            do {
                $repeat++;
                $maxInterval = $repeat*$minTimeRange / $count;
                $maxInterval = floor($maxInterval);
            } while($maxInterval < 1);
        }
        $times = [];
        $lastTime = 0;
        do {
            $times[] = $lastTime;
            $lastTime += $maxInterval;
        }while($lastTime < $minTimeRange);
        $timesCount = count($times);
        $repeat = $count / $timesCount;
        $repeat = floor($repeat);
        $rest   = $count - ($timesCount * $repeat);
        $scheduledData = [];
        foreach($times as $index => $time) {
            $itemRepeat = $repeat;
            if (($rest >= ($index + 1))) {
                $itemRepeat++;
            }
            $scheduledData[$time] = array_splice($tasks, 0, $itemRepeat);
            if(empty($tasks)) break;
        }
        return $scheduledData;

    }

    public static function generateCronContext($startTime, array $schedulingData) {
        $cronContext = [];
        list($h, $m) = explode(':', $startTime);
        $timeByMinute = 60*$h + $m;
        foreach($schedulingData as $minute => $data) {
            $cronMinute = $timeByMinute + $minute;
            $h = intval($cronMinute / 60);
            $m = $cronMinute % 60;
            foreach($data as $row) {
                if($m < 10) {
                    $m = "0".$m;
                }
                if($h < 10) {
                    $h = "0".$h;
                }
                $cronContext[] = "$m $h * * *  $row";
            }
        }
        return implode("\n", $cronContext);
    }



}