app.controller('clientController', ['$scope', 'userServices', 'SweetAlert',
function ($scope, userServices, SweetAlert) {
    'use strict';

    $scope.clientInfo = {
        role : 'Client'
    };
    $scope.formOpen = false;
    $scope.updateUserInfo = false;
    $scope.loading = false;

    $scope.clientsList = [];

    $scope.addNewClient = function (form) {
        if(form.$invalid) return;

        userServices.register($scope.clientInfo)
            .success(function (data) {
                if (data.status) {
                    $scope.clientInfo = {
                        role : 'Client'
                    };
                    $scope.slideForm();
                    $scope.getClientsList();
                }
            });
    };

    $scope.changeClientData = function (form) {
        if (form.$invalid) return;


    };

    $scope.cancelEdit = function() {
        $scope.updateUserInfo = false;
        $scope.clientInfo = {
            role : 'Client'
        };
        $scope.slideForm();
    };

    $scope.slideForm = function () {
        $scope.formOpen = !$scope.formOpen;

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

    $scope.editClientData = function(client) {
        $scope.clientInfo = client;
        $scope.updateUserInfo = true;
        if(!$scope.formOpen) {
            $scope.slideForm();
        }
    };

    $scope.deleteClient = function(client) {
        SweetAlert.swal({
            title: "Are you sure?",
            text:  "You will not be able to recover this client info!",
            type:  "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(res){
            if(res) {
                userServices.deleteUser(client.clientId)
                    .success(function(data){
                        if(data.status && data.result) {
                            SweetAlert.swal("Deleted!", "This client info has been deleted.", "success");
                            $scope.getClientsList();
                        }
                    });
            }
        });
    };

}]);