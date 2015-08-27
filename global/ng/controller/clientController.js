'use strict';

app.controller('clientController', ['$scope', 'userServices',
    function ($scope, userServices) {

        $scope.clientInfo = {
            role : 'Client'
        };

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

    }]);