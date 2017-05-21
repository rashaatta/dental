/**
 * Created by mohamed on 5/16/2017.
 */

(function () {
    'use strict';

    var modules = [
        'ui.router',
         "ct.ui.router.extras",
        'authModule',
        'coreModule',
        'staffModule',
        'datatables'
    ];


    var dentalApp = angular.module('dentalApp', modules);

// enable Blade by changing angular brackets to {[{ }]} so blade will use {{ }}
    dentalApp.config(['$interpolateProvider', '$locationProvider', function ($interpolateProvider, $locationProvider) {
        $interpolateProvider.startSymbol('{[{');
        $interpolateProvider.endSymbol('}]}');
        $locationProvider.hashPrefix('');
    }]);

    dentalApp.run(["coreService","$state", "$rootScope", "$location", function (coreService, $state, $rootScope, $location) {
        // "ngInject";
        coreService.clearAll();
        coreService.setApi('http://dental.dev:88/api/');
        coreService.setBaseUrl('http://dental.dev:88/');
        coreService.setVersion('1.0.0');
        coreService.setLang(currentLang);
        console.log(coreService.getLang());

        $rootScope.$on('$stateChangeStart', function (event, toState, toParams, fromState, fromParams) {
            coreService.setCurrentState(toState.name);
            coreService.setPreviousState(fromState.name);
            coreService.setCurrentParams(toParams);
            // console.log(toState);
            if (coreService.getStates() === null && toState.name !== "login") {
                event.preventDefault();
                $state.go("login");
            }
        })

    }])

}());


