'use strict';

app.controller('doctorController', ['$scope', 'userServices',
    function ($scope, userServices) {

        $scope.registerInfo = {
            role : 'Doctor'
        };

        $scope.register = function () {
            console.log($scope.registerInfo);
            //userServices.register($scope.registerInfo)
            //    .success(function (data) {
            //        if (data.result) {
            //            //window.location.reload();
            //        } else {
            //            // TODO: ALERT
            //        }
            //    });
        };

    }]);