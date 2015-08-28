'use strict';

app.controller('clientController', ['$scope', 'userServices',
    function ($scope, userServices) {

        $scope.clientInfo = {
            role : 'Client'
        };
        $scope.addNewOpen = false;
        $scope.updateUserInfo = false;

        $scope.register = function () {
            console.log($scope.clientInfo);
            userServices.register($scope.registerInfo)
                .success(function (data) {
                    if (data.result) {
                        //window.location.reload();
                    } else {
                        // TODO: ALERT
                    }
                });
        };

        $scope.getClientsList = function () {

            userServices.getUsersList($scope.filter)
                .success(function (data) {
                    if (data.result) {
                        //window.location.reload();
                    } else {
                        // TODO: ALERT
                    }
                });
        };

        $scope.slideForm = function () {
            if($scope.addNewOpen) {
                $scope.addNewOpen = false;
            } else {
                $scope.addNewOpen = true;
            }

            $('#clientRegistrationForm').slideToggle()
        }

    }]);