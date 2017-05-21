(function () {
    var directive = function ($filter) {
        return {
            restrict: 'A',
            require: 'ngModel',
            link: function (scope, element, attrs, ngModel) {
                scope.$watch(function () {
                    return ngModel.$modelValue
                }, function (modelValue) {
                    if (modelValue !== null && angular.isDefined(modelValue)) {
                        var value = $filter('phoneNumber')(modelValue)
                        ngModel.$setViewValue(value)
                        ngModel.$render()
                    }
                })
            }
        }
    }
    directive.$inject = ['$filter']
    angular.module('coreModule')
            .directive('myPhone', directive)
}())