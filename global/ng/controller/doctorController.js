app.controller('doctorController', ['$scope', 'userServices',
function ($scope, userServices) {
    'use strict';

    $scope.filter = {
        role : 'Doctor'
    };
    $scope.registerInfo = {
        role : 'Doctor'
    };
    $scope.addNewOpen = false;
    $scope.updateUserInfo = false;

    $scope.register = function () {

        userServices.register($scope.registerInfo)
            .success(function (data) {
                if (data.result) {
                    $scope.getDoctorsList();
                } else {
                    alert('Registration fail');
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
    };

    $scope.slideForm = function () {
        if($scope.addNewOpen) {
            $scope.addNewOpen = false;
        } else {
            $scope.addNewOpen = true;
        }

        $('#doctorRegistrationForm').slideToggle()
    }

}]);