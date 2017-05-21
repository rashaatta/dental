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
    var controller = function ($scope, coreService,  authService, $state) {

    };

controller.$inject = ['$scope', 'coreService',   'authService' , '$state'];
angular.module('authModule')
    .controller('authController', controller);
}());