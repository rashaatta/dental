/**
 * Created by Rasha on 5/21/2017.
 */

(function () {
    var module = angular.module('staffModule', ['datatables']);
    module.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
        // $urlRouterProvider.otherwise("/");
        $stateProvider
            .state("staff", {
                url: "^/staff",
                templateUrl: "angular/staffModule/views/staff.html",
                controller: "staffController",
                ncyBreadcrumb: {
                    label: 'staff'
                }
            })

            .state("addStaff", {
                url: "^/addStaff/:id",
                templateUrl: "angular/staffModule/views/addStaff.html",
                controller: "staffController",
                ncyBreadcrumb: {
                    label: 'staff'
                }
            })


    }])
}());