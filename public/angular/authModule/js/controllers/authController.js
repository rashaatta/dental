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
    var controller = function ($scope, coreService, authService, $state) {

        $scope.required = true;

        $scope.login = {
            username: 'rasha atta',
            password: 'password'
        };

        $scope.doLogin = function () {
            var loginData = {
                username: $scope.login.username,
                password: $scope.login.password
            };
            authService.doUserLogin(loginData)
                .then(function (response) {
                    if (!response.data.hasOwnProperty('file')) {

                       // console.log(response.data);
                        window.location = coreService.getBaseUrl();

                    } else {
                        //alert(response.data);
                    }
                }, function (response) {
                    console.log(response.data);
                });
        }



    };

    controller.$inject = ['$scope', 'coreService', 'authService', '$state'];
    angular.module('authModule')
        .controller('authController', controller);
}());