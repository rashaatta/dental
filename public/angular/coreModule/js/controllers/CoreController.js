(function () {
    var controller = function ($scope, coreService, authService, $location) {


        $scope.$watch(function () {
            return coreService.getAlert()
        }, function (newValue) {
            $scope.alerts = newValue
        })
        $scope.closeAlert = function (index) {
            $scope.alerts.splice(index, 1)
        }


        $scope.doLogout = function () {

            authService.doUserLogout()
                .then(function (response) {
                    if (!response.data.hasOwnProperty('file')) {

                        console.log(response.data);
                        window.location = coreService.getBaseUrl();
                    } else {
                        //alert(response.data);
                    }
                }, function (response) {
                    console.log(response.data);
                });
        }


    };
    controller.$inject = ['$scope', 'coreService', 'authService', '$location']
    angular.module('coreModule')
        .controller('CoreController', controller)
}())