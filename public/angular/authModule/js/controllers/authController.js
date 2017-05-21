/**
 * Created by mohamed on 5/16/2017.
 */

(function () {
    var controller = function ($scope, coreService, authService,constantService, $state) {
        var init = function () {
            $scope.loginLabels = {};
            $scope.frmlabels = constantService.getLoginLabels();
            angular.forEach($scope.frmlabels, function (value, key) {
                $scope.loginLabels[key] = value;
            });
        };
        init();

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

    controller.$inject = ['$scope', 'coreService','authService','constantService',  '$state'];
    angular.module('authModule')
        .controller('authController', controller);
}());