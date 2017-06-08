/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
        var controller = function ($rootScope, $stateParams, $scope, coreService, $state, constantService, staffService, $timeout) {

            $scope.staff = {};
            $scope.selectedStaff = {};
            $scope.weekdays = [];
            $scope.boxes = [false];
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

            };

            init();


            $scope.checkboxChecked = function (event, id) {
                // console.log(event + ' : ' + id);
                if (event === true) {

                    if ($scope.weekdays[id].entry_time === null) {
                        $scope.weekdays[id].entry_time = '09:00 AM';
                    }

                    if ($scope.weekdays[id].exit_time === null) {
                        $scope.weekdays[id].exit_time = '05:00 PM';
                    }
                }
                // console.log($scope.weekdays);
                // console.log($scope.boxes);
            };

            $scope.entryTimeChanged = function (entry_time, id) {
                console.log(entry_time + ' : ' + id);
                // console.log($scope.weekdays);
                // console.log($scope.boxes);
            };

            $scope.exitTimeChanged = function (exit_time, id) {
                console.log(exit_time + ' : ' + id);
                // console.log($scope.weekdays);
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

            // loadTimepicker();

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
                var postedData = {"staff": $scope.selectedStaff, "work-days": $scope.weekdays, "boxes": $scope.boxes};

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
