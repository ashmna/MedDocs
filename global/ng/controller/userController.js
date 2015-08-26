'use strict';

app.controller('userController', ['$scope', 'userServices',
function ($scope, userServices) {

    $scope.userLogin = {};
    $scope.userInfo = {};

    $scope.login = function(form) {
        if(form.$invalid) return;

        userServices.login($scope.userLogin)
            .success(function(data){
                if(data.result) {
                    window.location.reload();
                } else {
                    // TODO: ALERT
                }
            });

        userServices.register($scope.userInfo)
            .success(function(data){
                if(data.result) {
                    window.location.reload();
                } else {
                    // TODO: ALERT
                }
            });
    };

    $scope.initDatePicker = function(){
        jQuery('.datepicker').datepicker({
            format   : 'dd/mm/yyyy',
            startDate: new Date('1945-01-01'),
            autoclose: true,
            startView: 2
        })
    };

}]);