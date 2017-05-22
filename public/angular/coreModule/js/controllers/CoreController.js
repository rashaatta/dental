(function () {
    var controller = function ($scope, coreService, authService, $location, $cookies) {


        $scope.$watch(function () {
            return coreService.getAlert();
        }, function (newValue) {
            $scope.alerts = newValue;
        });


        $scope.closeAlert = function (index) {
            $scope.alerts.splice(index, 1);
        };


        $scope.doLogout = function () {

            authService.doUserLogout()
                .then(function (response) {
                    // console.log(response.data);
                    $cookies.remove('auth');
                    window.location = coreService.getBaseUrl();
                }, function (response) {
                    console.log(response.data);
                });
        }


    };


    controller.$inject = ['$scope', 'coreService', 'authService', '$location', '$cookies'];
    angular.module('coreModule')
        .controller('CoreController', controller)
}());
