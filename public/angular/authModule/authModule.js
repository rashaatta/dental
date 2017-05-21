/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
    var module = angular.module('authModule',[]);
    module.config(['$stateProvider','$urlRouterProvider',  function ($stateProvider,$urlRouterProvider) {
        //$urlRouterProvider.otherwise("/");
        $stateProvider
            .state("login", {
                url: "^/login",
                templateUrl: "angular/authModule/views/login.html",
                controller: "authController",
                ncyBreadcrumb: {
                    label: 'login'
                }
            })
            .state("register", {
                url: "^/register",
                templateUrl: "angular/authModule/views/register.blade.php",
                controller: "authController",
                ncyBreadcrumb: {
                    label: 'register'
                }
            })
              }])
}());