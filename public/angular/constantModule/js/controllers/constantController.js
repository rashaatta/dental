(function () {
    var controller = function ($scope, constantService) {
        $scope.$watch(function(code){
            console.log('code: '+ constantService.getMessage(code));
            return constantService.getMessage(code);
        })       
    }  
    controller.$inject = ['$scope', 'constantService'];
    angular.module('constantModule')
            .controller('constantController', controller);
}())