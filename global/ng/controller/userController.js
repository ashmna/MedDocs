app.controller('userController', ['$scope', 'userServices',
function ($scope, userServices) {
    'use strict';

    $scope.userLogin = {};

    $scope.login = function(form) {
        if(form.$invalid) return;

        userServices.login($scope.userLogin)
            .success(function(){
                window.location.reload();
            });
    }

}]);