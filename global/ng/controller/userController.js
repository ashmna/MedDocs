'use strict';

app.controller('userController', ['$scope', 'userServices',
function ($scope, userServices) {

    $scope.userLogin = {};

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
    };

}]);