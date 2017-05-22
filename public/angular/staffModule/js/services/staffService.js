/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
    var factory = function ($http, coreService) {
        return {
            getStaff: function(){
                return $http.get(coreService.getApi() + 'staff');
            }
        }
    }
    factory.$inject = ['$http', 'coreService'];
    angular.module('staffModule')
        .factory('staffService', factory);
}());