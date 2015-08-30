<?php


namespace MD\Services\Impl;


use MD\Helpers\Config;
use MD\Services\WorkingTimesService;

class WorkingTimesServiceImpl implements WorkingTimesService {

    /**
     * @Inject
     * @var \MD\DAO\WorkingTimes
     */
    protected $workingTimesDao;


    public function getDefaultWorkingTimesForDay() {
        $workingTimes = Config::getInstance()->workingTimes;
        return $workingTimes['day'];
    }

    public function getWorkingTimes($year, $month, $doctorId = 0) {

        //TODO Ashto $doctorId focus :)
        $doctorId = 2;

        return $this->workingTimesDao->getWorkingTimesByMonth($doctorId, intval($year), intval($month));
    }

    public function setDayWorkingTimes(\DateTime $date, array $times, $doctorId = 0) {

        //TODO Ashto $doctorId focus :)
        $doctorId = 2;

        return $this->workingTimesDao->setDayWorkingTimes($doctorId, $date, $times);
    }

    public function deleteDayWorkingTimes(\DateTime $date, $doctorId = 0) {

        //TODO Ashto $doctorId focus :)
        $doctorId = 2;

        return $this->workingTimesDao->deleteDayWorkingTimes($doctorId, $date);
    }


}