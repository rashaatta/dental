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

        var fillFormData = function () {
            return $http.get(coreService.getApi() + 'staff/add')
                .then(function (response) {
                    return response.data;
                });
        };

        var getStaff = function () {
            return $http.get(coreService.getApi() + 'staff')
                .then(function (response) {
                    return response.data;
                });
        };

        var saveStaff = function (staff) {
            return $http({
                method : "POST",
                url: coreService.getApi() + 'staff/saveStaff',
                params: {"Content-Type": "application/json"},
                data: staff
            }).then(function(response){
                return response.data;
            });
        };

        return {
            getStaff: getStaff,

            fillStaffForm: fillFormData,

            getStaffDataById: getStaffDataById,

            saveStaff: saveStaff


        }
    };

    factory.$inject = ['$http', 'coreService'];
    angular.module('staffModule')
        .factory('staffService', factory);
}());