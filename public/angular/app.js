/**
 * Created by mohamed on 5/16/2017.
 */

(function () {
    'use strict';

    var modules = [
        'ui.router'
        , "ct.ui.router.extras"
        , 'ngCookies'
        , 'ui.bootstrap'
        , 'authModule'
        , 'coreModule'
        , 'staffModule'
        , 'datatables'
        , 'constantModule'
        , 'patientModule'
        // , 'angular-confirm'
    ];


    var dentalApp = angular.module('dentalApp', modules);

// enable Blade by changing angular brackets to {[{ }]} so blade will use {{ }}
    dentalApp.config(['$interpolateProvider', '$locationProvider', function ($interpolateProvider, $locationProvider) {
        // $interpolateProvider.startSymbol('{[{');
        // $interpolateProvider.endSymbol('}]}');
        $locationProvider.hashPrefix('');
        // $locationProvider.html5Mode(true);
    }]);

    dentalApp.run(["coreService", "$state", "$rootScope", "$location", function (coreService, $state, $rootScope, $location) {
        // "ngInject";
        coreService.clearAll();
        coreService.setApi('http://dental.dev:8080/api/');
        coreService.setBaseUrl('http://dental.dev:8080');
        coreService.setVersion('1.0.0');
        coreService.setLang(currentLang);
        console.log(coreService.getLang());

        $rootScope.$on('$stateChangeStart', function (event, toState, toParams, fromState, fromParams) {
            coreService.setCurrentState(toState.name);
            coreService.setPreviousState(fromState.name);
            coreService.setCurrentParams(toParams);
            console.log(coreService.isLoggedIn());
            if (!coreService.isLoggedIn() && toState.name !== "login") {
                event.preventDefault();
                $state.go("login");
            }

            if (coreService.isLoggedIn() && toState.name === "login") {
                event.preventDefault();
                // $state.go('/');
                window.location.href = window.location.href;
            }
        })

    }])

}());


