'use strict';

app.controller('doctorController', ['$scope', 'userServices',
    function ($scope, userServices) {

        $scope.registerInfo = {};

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

        $scope.initDatePicker = function () {
            jQuery('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                startDate: new Date('1945-01-01'),
                autoclose: true,
                startView: 2
            })
        };

    }]);