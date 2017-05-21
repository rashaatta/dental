/**
 * Created by Rasha on 5/21/2017.
 */

/**
 * Created by mohamed on 5/16/2017.
 */

// dentalApp.controller('mainCtrl', [
//     '$scope', '$route', '$location', function mainCtrl($scope, $route, $location) {
//         this.$location = $location;
//         this.$route = $route;
//         var subView = $location.search().action;
//         console.log(subView);
//         $scope.name = 'Mahdy Basha';
//     }
// ]);


(function () {
        var controller = function ($scope, coreService, staffService, $state) {

            $scope.currentLang = coreService.getLang();
            $scope.staff = [];

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

        controller.$inject = ['$scope', 'coreService', 'staffService', '$state'];
        angular.module('staffModule')
            .controller('staffController', controller);
    }()
);
