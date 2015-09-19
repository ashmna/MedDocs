app.controller('clientController', ['$scope', 'userServices',
function ($scope, userServices) {
    'use strict';

    $scope.clientInfo = {
        role : 'Client'
    };
    $scope.addNewOpen = false;
    $scope.updateUserInfo = false;
    $scope.loading = false;

    $scope.clientsList = [];

    $scope.register = function () {

        userServices.register($scope.clientInfo)
            .success(function (data) {
                if (data.status) {
                    $scope.clientInfo = {};
                    $scope.slideForm();
                    $scope.getClientsList();
                }
            });
    };

    $scope.slideForm = function () {
        $scope.addNewOpen = !$scope.addNewOpen;

        $('#clientRegistrationForm').slideToggle();
    };

    $scope.getClientsList = function() {
        $scope.loading = true;
        userServices.getUsersList({role:'Client'})
            .success(function(data){
                if(data.status) {
                    $scope.clientsList = data.result;
                }
                $scope.loading = false;
            })
            .error(function(){
                $scope.loading = false;
            });
    };

    $scope.changeClientData = function(client) {
        //TODO implement changeClientData method
    };

    $scope.deleteClient = function(client) {
        //TODO implement deleteClient method
    };

}]);