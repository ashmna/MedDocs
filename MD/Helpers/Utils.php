<?php

namespace MD\Helpers;


class Utils {

    public static function arrayColumn($inputArray, $index) {
        if (function_exists('array_column')) {
            return array_column($inputArray, $index);
        } else {
            $outputArray = [];
            foreach ($inputArray as $inputArrayRow) {
                $outputArray[] = $inputArrayRow[$index];
            }
            return $outputArray;
        }
    }

    public static function initMonthDate(\DateTime $from=null, \DateTime $to=null) {
        if(!isset($from) || !isset($to)) {
            $from = new \DateTime('first day of this month');
            $from->setTime(0,0,0);
            $to   = new \DateTime();
            /*$from->setDate($from->format('Y'), 4, $from->format('d'));
            $to->setDate($to->format('Y'), 4, 30);
            $to->setTime(23,59,59);*/
        }
        return [$from, $to];
    }

    /**
     * @param string $sortString
     * @return array
     */
    public static function parsSortStringToArray($sortString) {
        $sort = [];
        if(!empty($sortString)) {
            list($key, $val) = explode('|', $sortString);
            if(!empty($key) && !empty($val)) {
                $key = trim($key);
                $val = trim($val);
                $sort[$key] = $val;
            }
        }
        return $sort;
    }

    public static function currencyFormatAllNumeric($arr, $symbol = '') {
        foreach($arr as &$val) {
            if(is_numeric($val) && !empty($val)) {
                $val = self::currencyFormat($val, $symbol);
            }
        }
        return $arr;
    }

    public static function currencyFormat($number, $symbol = '') {
        $string = number_format($number, 2, '.', ' ');
        if(!empty($symbol)) {
            $string = $symbol.' '.$string;
        }
        return $string;
    }

    public static function roundAllNumeric($arr) {
        foreach($arr as &$val) {
            if($val == '0') $val = 0;
            if(is_numeric($val) && !empty($val)) {
                $val = round($val, 2);
            }
        }
        return $arr;
    }

    public static function isValidFloat($string){
        if(!preg_match("/^[0-9]+(.[0-9]+)?$/",$string)){
            return false;
        }
        return true;
    }
    public static function dayByDayRecordsAndTotal(array $res, array $emptyRow, \DateTime $fromDate, \DateTime $toDate, $genRecords = false) {
        $total = $emptyRow;

        $records = [];
        if($genRecords) {
            $toDate = $toDate->add(new \DateInterval('PT1S')); //TODO: kara asenq aveli lav @lni bayc petq chi
            $dateRange = new \DatePeriod($fromDate, new \DateInterval('P1D'), $toDate);

            foreach($dateRange as $cDate) {
                /** @var \DateTime $cDate */
                $key = $cDate->format("Y-m-d");
                $records[$key] = $emptyRow;
                $records[$key]['date']     = $cDate->format("Y-m-d");
                $records[$key]['monthDay'] = $cDate->format("d/m");
            }
            foreach($res as $row) {
                $records[$row['date']] = array_merge($records[$row['date']], Utils::roundAllNumeric($row));
            }
        }

        $keys = array_keys($emptyRow);
        foreach($res as $row) {
            foreach($keys as $key) {
                $total[$key] += $row[$key];
            }
        }

        return [
            'records' => array_values($records),
            'total'   => $total,
        ];
    }

    public static function moveFiles($fromPath, $toPath, $except = []) {
        if(!file_exists($fromPath)) {
            return false;
        }

        if(is_dir($fromPath)) {
            $toPath = self::createDirectory($toPath);
        }

        foreach (glob($fromPath."/*") as $file) {
            $basename = basename($file);

            if(in_array($basename, $except)) {
                continue;
            }

            if(is_dir($file)) {
                self::moveFiles($file, $toPath.basename($file).DIRECTORY_SEPARATOR);
            }
            elseif(is_file($file)) {
                copy($file, $toPath.basename($file));
            }
        }
        return true;
    }

    public static function createDirectory($directory) {
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        return $directory;
    }

    public static function deleteDirectory($directory, $selfDelete) {
        $files = glob($directory . "/*");

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
            if (is_dir($file)) {
                self::deleteDirectory($file, true);
            }
        }

        if ($selfDelete == true && count(glob($directory . "/*")) == 0) {
            rmdir($directory);
        }

        return true;
    }

    public static function arrayToAssoc($array, $key) {
        $assocArray = [];
        foreach($array as $arrayRow) {
            if(isset($arrayRow[$key])) {
                $assocArray[$arrayRow[$key]] = $arrayRow;
            } else {
                return [];
            }

        }

        return $assocArray;
    }
    public static function format($msg, array $vars = []) {
        $config = Config::getInstance();

        $vars['partnerName']   = $config->partnerName;

        $msg = preg_replace_callback('#\{\}#', function($r){
            static $i = 0;
            return '{'.($i++).'}';
        }, $msg);

        return str_replace(
            array_map(function($k) {
                return '{'.$k.'}';
            }, array_keys($vars)),

            array_values($vars),

            $msg
        );
    }

    public static function mergeSets() {
        $set = [];
        $dataSets    = func_get_args();
        $length      = count($dataSets);
        $counterKeys = array_fill(0, $length, 0);
        $endLine = 0;
        $i = 0;
        while($endLine != $length) {
            $value = [];
            if($counterKeys[$i] > -1 ) {
                $x1 = $dataSets[$i][$counterKeys[$i]]['x1'];
                $x2 = $dataSets[$i][$counterKeys[$i]]['x2'];
            } else {
                $x1 = isset($x2) ? $x2 : 0;
                $x2 = null;
            }
            for ($k = 0; $k < $length; ++$k) {
                $value[$k] = 0;
                if($counterKeys[$k] == -1) continue;

                if( (isset($dataSets[$k][$counterKeys[$k]]['x2']) && isset($x2) && $x2 > $dataSets[$k][$counterKeys[$k]]['x2'])
                    || (!isset($x2) && isset($dataSets[$k][$counterKeys[$k]]['x2'])) ) {
                    $x2 = $dataSets[$k][$counterKeys[$k]]['x2'];
                    $i = $k;
                }
                $value[$k] = $dataSets[$k][$counterKeys[$k]]['value'];
            }
            for ($k = 0; $k < $length; ++$k) {
                if($counterKeys[$k] == -1) continue;
                if($x2 == $dataSets[$k][$counterKeys[$k]]['x2']) {
                    $counterKeys[$k]++;
                    if(count($dataSets[$k]) == $counterKeys[$k]) {
                        $endLine++;
                        $counterKeys[$k] = -1;
                    }
                }
            }
            $set[] = [
                'x1'    => $x1,
                'x2'    => $x2,
                'value' => $value,
            ];
        }
        return $set;
    }

    public static function isAssoc(array $arr) {
        return count($arr) && (array_keys($arr) !== range(0, count($arr) - 1));
    }
}