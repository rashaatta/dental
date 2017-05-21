(function () {
    Number.isFinite = Number.isFinite || function (value) {
        return typeof value === "number" && isFinite(value);
    }
    var filter = function () {
        return function (val) {
            if (Number.isFinite(val)) {
                return Math.round(val)
            } else {
                return val
            }
        }
    }
    angular.module('coreModule')
        .filter('roundSize', filter)
}())