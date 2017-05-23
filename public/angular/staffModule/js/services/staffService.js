/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
    var factory = function ($http, coreService) {
        return {
            getStaff: function(){
                return $http.get(coreService.getApi() + 'staff');
            },
            fillStaffForm: function(){
                return $http.get(coreService.getApi() + 'staff/add');
            },
            getStaffDataById: function(staffId){
                return $http.get(coreService.getApi() + 'staff/getStaffDataById/'+ staffId);
            }

        }
    }
    factory.$inject = ['$http', 'coreService'];
    angular.module('staffModule')
        .factory('staffService', factory);
}());