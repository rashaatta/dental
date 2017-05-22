/**
 * Created by Rasha on 5/21/2017.
 */


/**
 * Created by mohamed on 5/18/2017.
 */


// angular.module('authModule', [])
//     .factory('authService', ['$http', '$cookies', function ($http, $cookies) {
//
//         return {
//             checkAuth: function (loginData) {
//                 // console.log(loginData);
//                 return $http({
//                     headers: {'Content-Type': 'application/json'},
//                     url: baseUrl + 'api/auth',
//                     method: 'POST',
//                     data: loginData
//                 });
//
//             },
//
//             getAuthStatus: function () {
//
//                 var status = angular.fromJson($cookies.get('auth'));
//                 if (status) {
//                     return true;
//                 }
//
//                 return false;
//
//             },
//
//             doUserLogout: function () {
//                 $cookies.remove('auth');
//             }
//
//         };
//     }]);


(function () {
    var factory = function ($http, coreService) {
        return {

        }
    }
    factory.$inject = ['$http', 'coreService'];
    angular.module('authModule')
        .factory('authService', factory);
}());