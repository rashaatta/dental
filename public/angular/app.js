/**
 * Created by mohamed on 5/16/2017.
 */

'use strict';

const API_URL = 'http://dental.dev:88/api/v1/';

var dentalApp = angular.module('dentalApp', ['ngRoute', 'ngAnimate']);

// enable Blade by changing angular brackets to {[{ }]} so blade will use {{ }}
dentalApp.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{');
    $interpolateProvider.endSymbol('}]}');
}]);

// routing
dentalApp.config(function ($routeProvider, $locationProvider) {

        $routeProvider
            .when('/welcome2', {
                template : '<p>Hiiiiiiiiiiiiiiiiii</p>'
                // templateUrl: 'home.blade.php'
            })
            .when('/welcome', {
                template : 'welcome buddy'
                // templateUrl: '/views/staff/index.blade.php'
            })
            .when('/login', {
                template: 'temp',
                templateUrl: '/views/auth/login.blade.php'
            })
            .when('/staff', {
                templateUrl: '/views/staff/index.blade.php'
            })
            .when('/test', {
                template: 'testrouting',
                templateUrl: 'all.html'
            })
            .otherwise({redirectTo: '/'});

        // remove # from url
        $locationProvider.html5Mode(true);
    }
);


console.log('app loaded');