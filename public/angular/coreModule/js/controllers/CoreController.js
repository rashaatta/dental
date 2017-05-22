(function () {
    var controller = function ($scope, coreService,$location) {
        $scope.$watch(function(){
            return coreService.getAlert()
        },function(newValue){
            $scope.alerts = newValue
        })
        $scope.closeAlert = function(index){
            $scope.alerts.splice(index,1)
        }
    }  
    controller.$inject = ['$scope', 'coreService','$location']
    angular.module('coreModule')
            .controller('CoreController', controller)
}())