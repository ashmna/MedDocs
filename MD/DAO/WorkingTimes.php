<?php


namespace MD\DAO;


interface WorkingTimes {
    function getWorkingTimesByMonth($doctorId, $year, $month);
    function setDayWorkingTimes($doctorId, \DateTime $date, array $times);
    function deleteDayWorkingTimes($doctorId, \DateTime $date);
}