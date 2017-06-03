
(function () {
    var module = angular.module('patientModule', ['datatables']);
    module.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state("patient", {
                url: "^/patient",
                templateUrl: "angular/patientModule/views/patient.html",
                controller: "patientController",
                ncyBreadcrumb: {
                    label: 'patient'
                }
            })

            .state("addPatient", {
                url: "^/addPatient/:id",
                templateUrl: "angular/patientModule/views/addPatient.html",
                controller: "patientController",
                ncyBreadcrumb: {
                    label: 'patient'
                }
            })


    }])
}());