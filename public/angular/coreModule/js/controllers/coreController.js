(function () {
    var controller = function ($rootScope, $scope, coreService, authService, $location, $cookies, $timeout) {

        var core = this;

        core.user = coreService.getCurrentUser();
        core.navUrl = "nav.html";

        $scope.$watch(function () {
            return coreService.getCurrentUser();
        }, function (newValue) {
            core.user = newValue;
        });

        $scope.$watch(function () {
            return coreService.getAlert();
        }, function (newValue) {
            core.alerts = newValue;
        });


        core.closeAlert = function (index) {
            core.alerts.splice(index, 1);
        };


        core.doLogout = function () {

            authService.doUserLogout()
                .then(function (response) {
                    // console.log(response.data);
                    $cookies.remove('auth');
                    coreService.resetLocalUser();
                    window.location = coreService.getBaseUrl();
                }, function (response) {
                    console.log(response.data);
                });
        };

        core.checkActiveLink = function (link) {
            // console.log(coreService.getCurrentState());
            if (coreService.getCurrentState() === link) {
                return 'active-link';
            }
        };

        core.userLoggedIn = function () {
            return coreService.isLoggedIn();
        };

    };


    controller.$inject = ['$rootScope', '$scope', 'coreService', 'authService', '$location', '$cookies', '$timeout'];
    angular.module('coreModule')
        .controller('coreController', controller);
}());
