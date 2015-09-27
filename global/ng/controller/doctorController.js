app.controller('doctorController', ['$scope', 'userServices', 'SweetAlert',
function ($scope, userServices, SweetAlert) {
    'use strict';

    $scope.filter = {role : 'Doctor'};
    $scope.doctorInfo = {role : 'Doctor'};
    $scope.formOpen = false;
    $scope.updateUserInfo = false;
    $scope.loading = false;

    $scope.doctorsList = [];

    $scope.register = function () {

        $scope.loading = true;
        userServices.register($scope.doctorInfo)
            .success(function (data) {
                if (data.result) {
                    $scope.getDoctorsList();
                    $scope.loading = false;
                } else {
                    alert('Registration fail');
                    $scope.loading = false;
                }
            });
    };

    $scope.getDoctorsList = function () {

        $scope.loading = true;
        userServices.getUsersList($scope.filter)
            .success(function (data) {
                if (data.result) {
                    $scope.doctorsList = data.result;
                    $scope.loading = false;
                } else {
                    $scope.loading = false;
                }
            });
    };

    $scope.slideForm = function () {
        $scope.formOpen = !$scope.formOpen;
        $('#doctorRegistrationForm').slideToggle()
    };

    $scope.editDoctorData = function(doctor) {
        $scope.doctorInfo = doctor;
        $scope.updateUserInfo = true;
        if(!$scope.formOpen) {
            $scope.slideForm();
        }
    };

    $scope.deleteDoctor = function(doctor) {
        $scope.loading = true;
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
                    userServices.deleteUser(doctor.doctorId)
                        .success(function(data){
                            if(data.status && data.result) {
                                SweetAlert.swal("Deleted!", "This doctor info has been deleted.", "success");
                                $scope.getDoctorsList();
                                $scope.loading = false;
                            } else {
                                $scope.loading = false;
                            }
                        })
                        .error(function(){
                            $scope.loading = false;
                        });
                }
            });
    };

    $scope.changeDoctorData = function() {
        $scope.register();
    }
}]);