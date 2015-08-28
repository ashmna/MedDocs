'use strict';

app.controller('workingTimesController', ['$scope',
function ($scope) {

    $scope.monthList = [];
    $scope.month = 0;

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
        var tempweekday = tempDate.getDay();
        var tempweekday2 = tempweekday;
        var dayAmount = totalDays[month];

        var days = [];


        while (tempweekday > 0) {
            days.push(0);
            tempweekday--;
        }

        while (i <= dayAmount) {
            if (tempweekday2 > 6) {
                retMonth.push(days);
                days = [];
                tempweekday2 = 0;
            }

            if (i == day && month == cmonth) {
                days.push(i);
            } else {
                days.push(i);
            }
            tempweekday2++;
            i++;

        }
        while (tempweekday2 < 7) {
            days.push(0);
            tempweekday2++;
        }
        if (days.length) {
            retMonth.push(days);
        }
        return retMonth;
    }

    $scope.renderMonth = function (month) {
        $scope.month = month | new Date().getMonth();
        $scope.monthList = calendar($scope.month);
    };






}]);

