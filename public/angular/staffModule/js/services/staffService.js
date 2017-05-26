/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
    var factory = function ($http, coreService) {

        var getStaffDataById = function (staffId) {
            return $http.get(coreService.getApi() + 'staff/getStaffDataById/' + staffId)
                .then(function (response) {
                    return response.data;
                });
        };

        return {
            getStaff: function () {
                return $http.get(coreService.getApi() + 'staff');
            },
            fillStaffForm: function () {
                return $http.get(coreService.getApi() + 'staff/add');
            },
            getStaffDataById: getStaffDataById,

            saveStaff: function (staff) {
                return $http.post(coreService.getApi() + 'staff/saveStaff', staff);
            }

        }
    }
    factory.$inject = ['$http', 'coreService'];
    angular.module('staffModule')
        .factory('staffService', factory);
}());