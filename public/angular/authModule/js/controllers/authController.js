/**
 * Created by mohamed on 5/16/2017.
 */

(function () {
    var controller = function ($scope, coreService, authService, constantService, $state, $cookies) {

        $scope.required = true;
        $scope.login = {
            username: 'Rasha Atta',
            password: 'secret',
            remember: false
        };

        var init = function () {
            $scope.loginLabels = {};
            $scope.loginLabels = constantService.getLoginLabels();
        };

        init();


        $scope.doLogin = function () {
            var loginData = {
                username: $scope.login.username,
                password: $scope.login.password,
                remember: $scope.login.remember
            };
            authService.doUserLogin(loginData)
                .then(function callbackSuccess(response) {
                    if (!response.data.hasOwnProperty('file')) {
                        $cookies.put('auth', JSON.stringify(response.data));
                        // console.log(coreService.isLoggedIn());
                        window.location = coreService.getBaseUrl();
                    }
                }, function callbackError(error) {
                    console.log(error.data);
                });
        };

    };

    controller.$inject = ['$scope', 'coreService', 'authService', 'constantService', '$state', '$cookies'];
    angular.module('authModule')
        .controller('authController', controller);
}());