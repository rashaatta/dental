(function () {
    var filter = function () {
        return function (int) {
            return int == 1 || int === true? 'Yes' : 'No';
        };
    };
    angular.module('coreModule')
            .filter('trueFalse', filter);
}());