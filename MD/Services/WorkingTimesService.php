<?php

namespace MD\Services;


interface WorkingTimesService {
    function getDefaultWorkingTimesForDay();
    function getWorkingTimes($year, $month, $doctorId = 0);
    function setDayWorkingTimes(\DateTime $date, array $times, $doctorId = 0);
    function deleteDayWorkingTimes(\DateTime $date, $doctorId = 0);
}