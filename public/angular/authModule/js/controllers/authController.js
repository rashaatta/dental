/**
 * Created by mohamed on 5/16/2017.
 */

(function () {
    var controller = function ($scope, coreService, authService, constantService, $state) {
        var init = function () {
            $scope.loginLabels = {};
            $scope.loginLabels = constantService.getLoginLabels();

        };
        init();
        if (coreService.getCurrentState() === "login") {
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
                            window.location = coreService.getBaseUrl();
                        }
                    }, function (error) {
                        console.log(error.data);
                    });
            }
        }


    };

    controller.$inject = ['$scope', 'coreService', 'authService', 'constantService', '$state'];
    angular.module('authModule')
        .controller('authController', controller);
}());