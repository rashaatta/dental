/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
        var controller = function ($scope, coreService, constantService, staffService, $state) {

            var init = function () {
                $scope.staffLabels = {};
                $scope.staffLabels = constantService.getStaffLabels();
            };

            init();

            $scope.currentLang = coreService.getLang();
            $scope.staff = {};

            if (coreService.getCurrentState() === "staff") {
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

            }
        };

        controller.$inject = ['$scope', 'coreService', 'constantService', 'staffService', '$state'];
        angular.module('staffModule')
            .controller('staffController', controller);
    }()
);
