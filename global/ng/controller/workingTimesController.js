'use strict';

app.controller('workingTimesController', ['$scope',
function ($scope) {

    $scope.monthList = [];
    $scope.month = 0;
    $scope.year = new Date().getYear();
    $scope.dayWorkingTimes = [
        {from:"10:00:00", to:"14:00:00"},
        {from:"15:00:00", to:"19:00:00"}
    ];

    $scope.workingTimes = {};

    function calendar(month) {
        var retMonth = [];
        var totalFeb = "";
        var i = 1;

        var current = new Date();
        var cmonth = current.getMonth(); // current (today) month
        var day = current.getDate();
        var year = current.getFullYear();
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
            days.push({day:0});
            tempweekday--;
        }

        while (i <= dayAmount) {
            if (tempweekday2 > 6) {
                retMonth.push(days);
                days = [];
                tempweekday2 = 0;
            }

            if (i == day && month == cmonth) {
                days.push({day:i, current: true});
            } else {
                days.push({day:i});
            }
            tempweekday2++;
            i++;

        }
        while (tempweekday2 < 7) {
            days.push({day:0});
            tempweekday2++;
        }
        if (days.length) {
            retMonth.push(days);
        }
        return retMonth;
    }

    $scope.renderMonth = function (month) {
        month = month | new Date().getMonth();
        $scope.monthList = calendar(month);
        $scope.month = month + 1;
        if($scope.month < 10) {
            $scope.month = "0" + $scope.month;
        }
    };

    $scope.daySelect = function(item) {
        if(!item.day) return;

        var day = (item.day < 10) ? "0" + item.day : item.day;

        var key = $scope.year + "-" + $scope.month + "-" + day;

        if($scope.workingTimes[key]) {
            item.wait = true;
            delete $scope.workingTimes[key];
        } else {
            item.wait = true;
            $scope.workingTimes[key] = angular.copy($scope.dayWorkingTimes);
        }
    }






}]);

