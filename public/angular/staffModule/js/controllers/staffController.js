/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
        var controller = function ($scope, coreService,constantService, staffService, $state) {

            var init = function () {
                $scope.staffLabels = {};
                $scope.frmlabels = constantService.getStaffLabels();
                angular.forEach($scope.frmlabels, function (value, key) {
                    $scope.staffLabels[key] = value;
                });
            };
            init();

            $scope.currentLang = coreService.getLang();
            $scope.staff = {};

            // DataTables configurable options
            // $scope.dtOptions = DTOptionsBuilder.newOptions()
            //     .withDisplayLength(10)
            //     .withOption('bLengthChange', false);


            $scope.listStaff = function () {
                staffService.getStaff().then(
                    function (response) {
                        // console.log(response.data);
                        $scope.staff = response.data;

                    }, function (response) {
                        console.log(response);
                    }
                );
            };

            $scope.getLang = function () {
                return coreService.getLang();
            }

            $scope.listStaff();


        };

        controller.$inject = ['$scope', 'coreService','constantService', 'staffService', '$state'];
        angular.module('staffModule')
            .controller('staffController', controller);
    }()
);
