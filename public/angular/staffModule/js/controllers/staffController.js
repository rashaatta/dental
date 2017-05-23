/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
        var controller = function ($rootScope, $scope, coreService, constantService, staffService, $state) {

            var init = function () {
                $scope.staffLabels = {};
                $scope.staffLabels = constantService.getStaffLabels();

                //$('#timepicker1').timepicker();




            };

            init();
            $scope.currentLang = coreService.getLang();
            $scope.staff = {};
            if (coreService.getCurrentState() === "staff") {
                $scope.staff = {};
                $scope.selectedStaff = {};

                $scope.listStaff = function () {
                    staffService.getStaff().then(
                        function (response) {
                            $scope.staff = response.data;
                        }, function (error) {
                            console.log(error.data);
                        });
                };
                $scope.listStaff();

            }

            if (coreService.getCurrentState() === "addStaff") {


                $scope.mytime = new Date();

                $scope.hstep = 1;
                $scope.mstep = 15;

                $scope.options = {
                    hstep: [1, 2, 3],
                    mstep: [1, 5, 10, 15, 25, 30]
                };

                $scope.ismeridian = true;
                $scope.toggleMode = function() {
                    $scope.ismeridian = ! $scope.ismeridian;
                };

                $scope.update = function() {
                    var d = new Date();
                    d.setHours( 14 );
                    d.setMinutes( 0 );
                    $scope.mytime = d;
                };



                staffService.fillStaffForm().then(
                    function (response) {
                        $scope.weekdays = response.data.days;
                        $scope.specialty = response.data.specialty;

                        console.log($rootScope.selectedStaff);
                        if (angular.isDefined($rootScope.selectedStaff) && $rootScope.selectedStaff !== null) {
                            staffService.getStaffDataById($scope.selectedStaff.id).then(
                                function (response) {
                                    $scope.selectedStaff = response.data.staff;

                                    $scope.selectedStaff.selectWD = [];
                                    $scope.selectedStaff.selectWD = response.data.swd;

                                    console.log(selectedStaff.selectWD[0].work_days_id);
                                }
                            )
                        }
                    }, function (error) {
                        console.log(error.data);
                    });
            }


            $scope.editStaff = function (item) {
                $scope.selectedStaff = item;
                $rootScope.selectedStaff = item;
            }
            $scope.emptySelectedStaff = function () {
                $rootScope.selectedStaff = null;
            }
            $scope.saveStaff= function(){
                console.log($scope.selectedStaff.selectWD);
                console.log($scope.selectedStaff);
            }
        };

        controller.$inject = ['$rootScope', '$scope', 'coreService', 'constantService', 'staffService', '$state'];
        angular.module('staffModule')
            .controller('staffController', controller);
    }()
);
