app.service('workingTimesService', ['serverConnector', function (serverConnector) {
    'use strict';

    function url(url) {
        return '/api/workingTimes/' + url + '/';
    }


    this.getDefaultWorkingTimesForDay = function () {
        return serverConnector.send({
            url   : url('get-default-working-times-for-day'),
            method: 'GET'
        });
    };

    this.getWorkingTimes = function (year, month) {
        return serverConnector.send({
            url   : url('get-working-times'),
            method: 'GET',
            params: {year : year, month : month}
        });
    };

    this.setDayWorkingTimes = function (date, times) {
        return serverConnector.send({
            url : url('set-day-working-times'),
            data: {date : date, times : times}
        });
    };

    this.deleteDayWorkingTimes = function (date) {
        return serverConnector.send({
            url : url('delete-day-working-times'),
            data: {date : date}
        });
    };

}]);