(function () {
        var controller = function ($rootScope, $scope, $stateParams, $state, coreService, constantService, patientService) {

            $scope.patient = {};
            $scope.selectedPatient = {};
            $scope.selectedPatient.id = $stateParams.id;
            $scope.currentLang = coreService.getLang();

            var init = function () {
                $scope.patientLabels = {};
                $scope.patientLabels = constantService.getPatientLabels();
            };
            init();

            $scope.listPatient = function () {
                patientService.getPatient().then(
                    function (data) {
                        $scope.patient = data;
                    }, function (error) {
                        console.log(error);
                    });
            };

            if (coreService.getCurrentState() === "patient") {
                $scope.listPatient();
            }

            if (coreService.getCurrentState() === "addPatient") {
                patientService.getCorporation().then(
                    function (response) {

                        console.log(response.data);
                        if (!response.data.hasOwnProperty('file')) {
                            $scope.corporations = response.data;
                        }
                    }, function callbackError(error) {
                        console.log(error.data);
                    });


                // edit
                if ($scope.selectedPatient.id != '') {
                    patientService.getPatientDataById($scope.selectedPatient.id)
                        .then(function callbackSuccess(response) {
                            if (!response.data.hasOwnProperty('file')) {
                                $scope.selectedPatient = response.data;
                            }
                        }, function callbackError(error) {
                            console.log(error.data);
                        });
                }
            }

            $scope.editPatient = function (item) {
                $scope.selectedPatient = item;
                $rootScope.selectedPatient = item;
            };

            $scope.emptySelectedPatient = function () {
                $rootScope.selectedPatient = null;
            };

            $scope.savePatient = function () {
                patientService.savePatient($scope.selectedPatient)
                    .then(function callbackSuccess(response) {
                        console.log(response.data);
                        if (!response.data.hasOwnProperty('file')) {
                            $state.go('patient');
                        }
                    }, function callbackError(error) {
                        console.log(error.data);
                    });

            };
        };

        controller.$inject = ['$rootScope', '$scope', '$stateParams', '$state', 'coreService', 'constantService', 'patientService', '$state', '$filter'];
        angular.module('patientModule')
            .controller('patientController', controller);
    }()
);
