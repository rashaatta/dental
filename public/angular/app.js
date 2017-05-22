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
            .when('/', {
                templateUrl : 'views/auth/login.php'
            })
            .when('/welcome', {
                template : 'welcome buddy'
                // templateUrl: '/views/staff/index.blade.php'
            })
            .when('/login', {
                // template: '<br/><br/><br/><br/><br/><br/>temp',
                templateUrl: 'views/auth/login.php'
            })
            .when('/ddddd', {
                templateUrl: '/views/staff/index.blade.php'
            })
            .when('/test', {
                template: 'testrouting',
                templateUrl: 'all.html'
            })
            .otherwise({redirectTo: '/'});

        // remove # from url
        //$locationProvider.html5Mode(true);

    // remove ! from # and url
        $locationProvider.hashPrefix('');
    }
);


console.log('app loaded');