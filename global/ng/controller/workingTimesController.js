'use strict';

app.controller('workingTimesController', ['$scope', 'workingTimesService',
function ($scope, workingTimesService) {

    $scope.monthList = [];
    $scope.month = "01";
    $scope.year  = "2015";
    $scope.currentMonth = 'thisMonth';
    $scope.dayWorkingTimes = [];

    $scope.workingTimes = {};
    $scope.getedworkingTimes = {};

    function calendar(month) {
        var retMonth = [];
        var totalFeb = "";
        var i = 1;

        var current = new Date();
        var cmonth = current.getMonth(); // current (today) month
        var day = current.getDate();
        var year = $scope.year;
        var tempMonth = month + 1; //+1; //Used to match up the current month with the correct start date.


        if (month == 1) {
            if ((year % 100 !== 0) && (year % 4 === 0) || (year % 400 === 0)) {
                totalFeb = 29;
            } else {
                totalFeb = 28;
            }
        }


        var totalDays = ["31", "" + totalFeb + "", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31"];

        // Temp values to get the number of days in current month, and previous month. Also getting the day of the week.
        var tempDate = new Date(tempMonth + ' 1 ,' + year);
        var tempweekday = tempDate.getDay() -1;
        var tempweekday2 = tempweekday;
        var dayAmount = totalDays[month];

        var days = [];


        while (tempweekday > 0) {
            days.push({day:0, disable:true});
            tempweekday--;
        }


        var key = '', dayKey = '', dayObj = {},
            prefixKey = $scope.year + "-" + $scope.month + "-";

        while (i <= dayAmount) {
            dayKey = i<10 ? "0"+i : i;
            key = prefixKey + dayKey;
            if (tempweekday2 > 6) {
                retMonth.push(days);
                days = [];
                tempweekday2 = 0;
            }

            dayObj = {
                day     : i,
                key     : key,
                working : false
            };
            if($scope.workingTimes[key]) {
                dayObj.working = true;
                dayObj.times = $scope.workingTimes[key];
            }

            if (i == day && month == cmonth) {
                dayObj.current = true;
            } else if(month > cmonth || (month == cmonth && i>day)) {
            } else {
                dayObj.disable = true;
            }
            days.push(dayObj);
            tempweekday2++;
            i++;

        }
        while (tempweekday2 < 7) {
            days.push({day:0, disable:true});
            tempweekday2++;
        }
        if (days.length) {
            retMonth.push(days);
        }
        return retMonth;
    }

    $scope.init = function() {
        var currentDate = new Date();
        workingTimesService.getDefaultWorkingTimesForDay().success(function(data){
            $scope.dayWorkingTimes = data.result;
        });
        $scope.year = currentDate.getFullYear();
        $scope.renderMonth(currentDate.getMonth());
        workingTimesService.getWorkingTimes($scope.year, $scope.month).success(function(data){
            $scope.workingTimes = angular.merge($scope.workingTimes, data.result);
            $scope.getedworkingTimes[$scope.year + $scope.month] = true;
            $scope.renderMonth(parseInt($scope.month) -1);
        });
    };

    $scope.changeMonth = function(currentMonth) {
        if($scope.currentMonth != currentMonth) {
            $scope.currentMonth = currentMonth;
            var month = parseInt($scope.month);
            month -= 1;
            if(currentMonth == 'thisMonth' ) {
                if(month == 0) {
                    month = 11;
                    $scope.year -= 1;
                } else {
                    month -= 1;
                }
            } else {
                if(month == 11) {
                    $scope.year += 1;
                    month = 0;
                } else {
                    month += 1;
                }
            }

            console.log($scope.year, month);

            $scope.renderMonth(month);
            if(!$scope.getedworkingTimes[$scope.year + $scope.month]) {
                workingTimesService.getWorkingTimes($scope.year, $scope.month).success(function(data){
                    $scope.workingTimes = angular.merge($scope.workingTimes, data.result);
                    $scope.getedworkingTimes[$scope.year + $scope.month] = true;
                    $scope.renderMonth(parseInt($scope.month) -1);
                });
            }
        }
    };

    $scope.renderMonth = function (month) {
        month = month || new Date().getMonth();
        $scope.month = month + 1;
        if($scope.month < 10) {
            $scope.month = "0" + $scope.month;
        }
        $scope.monthList = calendar(month);
    };

    $scope.daySelect = function(item) {
        if(!item.day || item.disable) return;

        if($scope.workingTimes[item.key]) {
            item.wait = true;
            workingTimesService.deleteDayWorkingTimes(item.key).success(function(data){
                item.wait = false;
                item.working = false;
                delete item.times;
                delete $scope.workingTimes[item.key];
            });
        } else {
            item.wait = true;
            var times = angular.copy($scope.dayWorkingTimes);
            workingTimesService.setDayWorkingTimes(item.key, times).success(function(data){
                item.wait = false;
                item.working = true;
                item.times = times;
                $scope.workingTimes[item.key] = times;
            });
        }
    }




}]);

