/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
        var controller = function ($rootScope, $stateParams, $scope, coreService, $state, constantService, staffService, $timeout) {

            $scope.staff = {};
            $scope.selectedStaff = {};
            $scope.weekdays = [];
            $scope.boxes = [0];
            $scope.selectedStaff.id = $stateParams.id;
            $scope.currentLang = coreService.getLang();

            $scope.listStaff = function () {
                staffService.getStaff().then(
                    function (data) {
                        $scope.staff = data;
                    }, function (error) {
                        console.log(error);
                    });
            };

            var init = function () {
                $scope.staffLabels = {};
                $scope.staffLabels = constantService.getStaffLabels();

                //$('#timepicker1').timepicker();
            };

            init();


            $scope.checkboxChecked = function (event) {
                console.log(event);
                // console.log($scope.boxes);
            };

            var formData = staffService.fillStaffForm();
            formData.then(
                function (data) {
                    $scope.weekdays = data.days;
                    $scope.specialty = data.specialty;
                }, function (error) {
                    console.log(error);
                });


            var loadTimepicker = function () {
                $timeout(function () {
                    $('input.timepicker').timepicker();
                }, 1000);
            };

            loadTimepicker();

            if (coreService.getCurrentState() === "staff") {
                $scope.listStaff();
            }

            if (coreService.getCurrentState() === "addStaff") {
                // edit
                if ($scope.selectedStaff.id !== "") {
                    // $scope.update = function () {
                    //     var d = new Date();
                    //     d.setHours(14);
                    //     d.setMinutes(0);
                    //     $scope.entry_time = d;
                    // };

                    console.log($stateParams);

                    var myData = staffService.getStaffDataById($scope.selectedStaff.id);

                    myData.then(
                        function callbackSuccess(data) {
                            $scope.selectedStaff = data.staff;
                            $scope.weekdays = data.days;
                            var i = 1;
                            $.each(data.days, function (key, item) {
                                $scope.boxes[i++] = (item.work_days_id > 0);
                                // console.log(item);
                            });

                            console.log($scope.boxes);
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

                var postedData = {"staff": $scope.selectedStaff, "work-days": $scope.weekdays};
                // console.log(JSON.stringify(postedData));
                staffService.saveStaff(postedData)
                    .then(function callbackSuccess(data) {

                        if (!data.hasOwnProperty('file')) {
                            console.log(data);
                            //$state.go('staff');
                        }
                    }, function callbackError(error) {
                        console.log(error);
                    });

            };
        };

        controller.$inject = ['$rootScope', '$stateParams', '$scope', 'coreService', '$state', 'constantService', 'staffService', '$timeout', '$state', '$filter'];
        angular.module('staffModule')
            .controller('staffController', controller);
    }()
);
