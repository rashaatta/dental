/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
        var controller = function ($rootScope, $scope, coreService, constantService, staffService, $state, $filter) {

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
                // $scope.update = function () {
                //     var d = new Date();
                //     d.setHours(14);
                //     d.setMinutes(0);
                //     $scope.entry_time = d;
                // };


                staffService.fillStaffForm().then(
                    function (response) {
                        $scope.weekdays = response.data.days;
                        $scope.specialty = response.data.specialty;
                        console.log($rootScope.selectedStaff);
                        if (angular.isDefined($rootScope.selectedStaff) && $rootScope.selectedStaff !== null) {
                            staffService.getStaffDataById($rootScope.selectedStaff.id).then(
                                function (response) {
                                    $scope.selectedStaff = response.data.staff;

                                    $scope.selectedStaff.selectWD = [];
                                    $scope.selectedStaff.selectWD = response.data.swd;
                                }
                            )
                        }
                        else {
                            $scope.selectedStaff = {};
                            var date = moment(new Date()).format('YYYY-MM-DD');
                            var d1 = date + ' 18:23:34';
                            var d2 = date + ' 00:00:00';
                            console.log(d2);

                            $scope.selectedStaff.entry_time = d1;// new Date();
                            $scope.selectedStaff.exit_time = d2;// new Date();

                            $scope.hstep = 1;
                            $scope.mstep = 15;

                            $scope.options = {
                                hstep: [1, 2, 3],
                                mstep: [1, 5, 10, 15, 25, 30]
                            };

                            $scope.ismeridian = true;
                            $scope.toggleMode = function () {
                                $scope.ismeridian = !$scope.ismeridian;
                            };
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
            $scope.saveStaff = function () {
                // console.log($scope.selectedStaff.selectWD);
                //  console.log($scope.mytime);

                // if ($scope.mytime != '') {
                //     $scope.mytime2 = $filter('localToUtc')($scope.mytime, 'datetime');
                //     console.log($scope.mytime2);
                //
                //     $scope.mytime3 = $filter('utcToLocal')($scope.mytime2, 'datetime');
                //     console.log($scope.mytime3);
                // }

            }
        };

        controller.$inject = ['$rootScope', '$scope', 'coreService', 'constantService', 'staffService', '$state', '$filter'];
        angular.module('staffModule')
            .controller('staffController', controller);
    }()
);
