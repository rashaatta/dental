/**
 * Created by mohamed on 5/16/2017.
 */

(function () {
    'use strict';

    var modules = [
        'ui.router'
        , "ct.ui.router.extras"
        , 'ngCookies'
        , 'pascalprecht.translate'
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
        // $locationProvider.hashPrefix('');
        $locationProvider.html5Mode(true);
    }]);

    dentalApp.config(['$translateProvider', function ($translateProvider) {
        $translateProvider.useStaticFilesLoader({
            prefix: '/lang/locale-',
            suffix: '.json'
        });

        $translateProvider.useSanitizeValueStrategy('escape');
        $translateProvider.preferredLanguage('ar');
        $translateProvider.useLocalStorage();
        $translateProvider.useMissingTranslationHandlerLog();
    }]);

    // dentalApp.config(['$qProvider', function ($qProvider) {
    //     $qProvider.errorOnUnhandledRejections(false);
    // }]);

    dentalApp.run(function (coreService, $state, $rootScope, $location) {
        // "ngInject";
        //===================== language support ======================
        $rootScope.lang = 'en';

        $rootScope.default_float = 'left';
        $rootScope.opposite_float = 'right';

        $rootScope.default_direction = 'ltr';
        $rootScope.opposite_direction = 'rtl';
        $rootScope.$on('$translateChangeSuccess', function (event, data) {
            var language = data.language;

            $rootScope.lang = language;

            $rootScope.default_direction = language === 'ar' ? 'rtl' : 'ltr';
            $rootScope.opposite_direction = language === 'ar' ? 'ltr' : 'rtl';

            $rootScope.default_float = language === 'ar' ? 'right' : 'left';
            $rootScope.opposite_float = language === 'ar' ? 'left' : 'right';
        });
        // ============================================================
        // $rootScope.user = coreService.getCurrentUser();
        coreService.clearAll();
        coreService.setApi('http://dental.dev:8080/api/');
        coreService.setBaseUrl('http://dental.dev:8080');
        coreService.setVersion('1.0.0');
        coreService.setLang(currentLang);
        console.log(coreService.getLang());
        console.log("run called");

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
                // $state.go('login');
                // window.location.href = window.location.href;
                window.history.back();
            }
        })

    })

}());


