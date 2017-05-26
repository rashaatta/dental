/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
        var controller = function ($rootScope, $stateParams, $scope, $state, coreService, constantService, staffService) {

            $scope.staff = {};
            $scope.selectedStaff = {};
            $scope.weekdays = [];
            $scope.session = [5,10,15,20,25,30,35,40,45,50,55,60];
            $scope.selectedStaff.id = $stateParams.id;
            $scope.currentLang = coreService.getLang();

            $scope.listStaff = function () {
                staffService.getStaff().then(
                    function (response) {
                        $scope.staff = response.data;
                    }, function (error) {
                        console.log(error.data);
                    });
            };

            var init = function () {
                $scope.staffLabels = {};
                $scope.staffLabels = constantService.getStaffLabels();

                //$('#timepicker1').timepicker();
            };

            init();

            if (coreService.getCurrentState() === "staff") {
                $scope.listStaff();
            }


            if (coreService.getCurrentState() === "addStaff") {

                $scope.session = [5,10,15,20,25,30,35,40,45,50,55,60];

                // edit
                if ($scope.selectedStaff.id !== "") {
                    console.log($stateParams);

                    var myData = staffService.getStaffDataById($scope.selectedStaff.id);

                    myData.then(
                        function callbackSuccess(data) {
                            $scope.selectedStaff = data.staff;
                            $scope.weekdays = data.days;
                            $scope.specialty = data.specialty;

                        }, function callbackError(data) {
                            console.log(data);
                        }
                    );


                    //
                    // staffService.fillStaffForm().then(
                    //     function (response) {
                    //         $scope.weekdays = response.data.days;
                    //         $scope.specialty = response.data.specialty;
                    //         console.log($scope.weekdays);
                    //         if (angular.isDefined($rootScope.selectedStaff) && $rootScope.selectedStaff !== null) {
                    //
                    //         }
                    //         else {
                    //             $scope.selectedStaff = {};
                    //             var date = moment(new Date()).format('YYYY-MM-DD');
                    //             var d1 = date + ' 18:23:34';
                    //             var d2 = date + ' 00:00:00';
                    //             console.log(d2);
                    //
                    //             $scope.selectedStaff.entry_time = d1;// new Date();
                    //             $scope.selectedStaff.exit_time = d2;// new Date();
                    //
                    //             $scope.hstep = 1;
                    //             $scope.mstep = 15;
                    //
                    //             $scope.options = {
                    //                 hstep: [1, 2, 3],
                    //                 mstep: [1, 5, 10, 15, 25, 30]
                    //             };
                    //
                    //             $scope.ismeridian = true;
                    //             $scope.toggleMode = function () {
                    //                 $scope.ismeridian = !$scope.ismeridian;
                    //             };
                    //         }
                    //     }, function (error) {
                    //         console.log(error.data);
                    //     });
                }
                else {
                    // add new staff
                    console.log($stateParams);

                    staffService.fillStaffForm().then(
                        function callbackSuccess(response) {
                            $scope.weekdays = response.data.days;
                            $scope.specialty = response.data.specialty;
                            console.log($scope.weekdays);
                        }, function callbackError(error) {
                            console.log(error.data);
                        });
                }
            }

            $scope.editStaff = function (item) {
                $scope.selectedStaff = item;
                $rootScope.selectedStaff = item;
            };

            $scope.emptySelectedStaff = function () {
                $rootScope.selectedStaff = null;
            };

            $scope.saveStaff = function () {
                console.log($scope.selectedStaff);
                staffService.saveStaff($scope.selectedStaff)
                    .then(function callbackSuccess(response) {
                        console.log(response.data);
                        if (!response.data.hasOwnProperty('file')) {
                            $state.go('staff');
                        }
                    }, function callbackError(error) {
                        console.log(error.data);
                    });

            };
        };

        controller.$inject = ['$rootScope', '$stateParams', '$scope', '$state', 'coreService', 'constantService', 'staffService', '$state', '$filter'];
        angular.module('staffModule')
            .controller('staffController', controller);
    }()
);
