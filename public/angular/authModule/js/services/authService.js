/**
 * Created by Rasha on 5/21/2017.
 */
(function () {
    var factory = function ($http, coreService) {
        return {
            doUserLogin:function(loginData){
                return $http.post( coreService.getApi() + 'auth', loginData);
            },
            doUserLogout:function(){
                return $http.get( coreService.getApi() + 'auth/logout');
            }
        }
    };

    factory.$inject = ['$http', 'coreService'];
    angular.module('authModule')
        .factory('authService', factory);
}());