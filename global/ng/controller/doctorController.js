'use strict';

app.controller('doctorController', ['$scope', 'userServices',
    function ($scope, userServices) {

        $scope.filter = {
            role : 'Doctor'
        };
        $scope.registerInfo = {
            role : 'Doctor'
        };

        $scope.register = function () {

            userServices.register($scope.registerInfo)
                .success(function (data) {
                    if (data.result) {
                        //window.location.reload();
                    } else {
                        // TODO: ALERT
                    }
                });
        };

        $scope.getDoctorsList = function () {

            userServices.getUsersList($scope.filter)
                .success(function (data) {
                    if (data.result) {
                        //window.location.reload();
                    } else {
                        // TODO: ALERT
                    }
                });
        }

    }]);