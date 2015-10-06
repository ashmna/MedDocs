app.controller('userController', ['$scope', 'userServices', 'SweetAlert',
function ($scope, userServices, SweetAlert) {
    'use strict';

    $scope.userLogin = {};
    $scope.userInfo = {};

    $scope.login = function(form) {
        if(form.$invalid) return;

        userServices.login($scope.userLogin)
            .success(function(data){
                if(data.result) {
                    window.location.reload();
                } else if(data.notification.length) {
                    SweetAlert.swal({
                        title: data.notification[0].title,
                        text: data.notification[0].content
                    });
                }
            });
    };

}]);