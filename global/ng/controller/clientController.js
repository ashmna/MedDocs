app.controller('clientController', ['$scope', 'userServices',
function ($scope, userServices) {
    'use strict';

    $scope.clientInfo = {
        role : 'Client'
    };
    $scope.addNewOpen = false;
    $scope.updateUserInfo = false;

    $scope.clientsList = [];

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

    $scope.slideForm = function () {
        $scope.addNewOpen = !$scope.addNewOpen;

        $('#clientRegistrationForm').slideToggle()
    };

    $scope.getClientsList = function() {
        userServices.getUsersList({role:'Client'})
            .success(function(data){
                if(data.status) {
                    $scope.clientsList = data.result;
                }
            });
    };

    $scope.changeClientData = function(client){
        //TODO implement changeClientData method
    };

    $scope.deleteClient = function(client){
        //TODO implement deleteClient method
    };

}]);