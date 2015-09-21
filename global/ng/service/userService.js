app.service('userServices', ['serverConnector', function (serverConnector) {
    'use strict';

    function url(url) {
        return '/api/user/' + url + '/';
    }


    this.login = function (data) {
        return serverConnector.send({
            url : url('login'),
            data: data
        });
    };

    this.logout = function (data) {
        return serverConnector.send({
            method: 'GET',
            url   : url('logout')
        });
    };

    this.register = function (data) {
        return serverConnector.send({
            url : url('register'),
            data: {userData: data}
        });
    };

    this.getUsersList = function (data) {
        return serverConnector.send({
            url : url('getUsersList'),
            data: {filter: data}
        });
    };

    this.deleteUser = function (userId) {
        return serverConnector.send({
            url : url('delete'),
            data: {userId : userId}
        });
    };

}]);