(function () {
    var factory = function ($http, coreService) {

        return {
            getPatient: function () {
                return $http.get(coreService.getApi() + 'patient');
            },
            getCorporation: function () {
                return $http.get(coreService.getApi() + 'patient/add');
            },
            getPatientDataById: function (id) {
                return $http.get(coreService.getApi() + 'patient/getPatientDataById/' + id);
            },
            savePatient: function (patient) {
                return $http.post(coreService.getApi() + 'patient/savePatient', patient);
            }

        }
    }
    factory.$inject = ['$http', 'coreService'];
    angular.module('patientModule')
        .factory('patientService', factory);
}());