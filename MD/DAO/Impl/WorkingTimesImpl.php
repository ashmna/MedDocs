<?php


namespace MD\DAO\Impl;


use MD\DAO\WorkingTimes;
use MD\Helpers\Config;

class WorkingTimesImpl implements WorkingTimes {


    /**
     * @Inject
     * @var \MD\Helpers\DB
     */
    protected $db;

    public function getWorkingTimesByMonth($doctorId, $year, $month) {
        $bind = [
            'partnerId' => Config::getInstance()->partnerId,
            'doctorId'  => $doctorId,
            'year'      => $year,
            'month'     => $month,
        ];
        $where = "partnerId = :partnerId AND doctorId = :doctorId AND YEAR(`date`) = :year AND MONTH(`date`) = :month";
        $arr = $this->db->select('workingTimes', $where, $bind, "*", "`date` ASC, `startTime` ASC");
        $res = [];
        foreach($arr as $row) {
            $key = $row['date'];
            if(!isset($res[$key])) {
                $res[$key] = [];
            }
            $res[$key][] = [
                'startTime' => $row['startTime'],
                'endTime'   => $row['endTime'],
            ];
        }
        return $res;
    }

    public function setDayWorkingTimes($doctorId, \DateTime $date, array $times) {
        $arr = [];
        $partnerId = Config::getInstance()->partnerId;
        $date = $date->format('Y-m-d');
        foreach($times as $row) {
            $row['partnerId'] = $partnerId;
            $row['doctorId'] = $doctorId;
            $row['date'] = $date;
            $arr[] = $row;
        }

        return $this->db->insertDataSet('workingTimes', $arr);
    }

    public function deleteDayWorkingTimes($doctorId, \DateTime $date) {
        $bind = [
            'partnerId' => Config::getInstance()->partnerId,
            'doctorId'  => $doctorId,
            'date'      => $date->format('Y-m-d'),
        ];
        $where = 'partnerId = :partnerId AND doctorId = :doctorId AND date = :date';
        return $this->db->delete('workingTimes', $where, $bind);
    }


}