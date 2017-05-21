(function(){
    var directive = function(){
        return {
                restrict: 'A',
                transclude: true,
                template:
                        '<a ng-click="onClick()">' +
                        '<span class="headtitle" ng-transclude ></span>' +
                '<div class="sort-items">'
                +'<i class="fa fa-caret-up" ng-hide="order === by && !reverse"></i> <i  class="fa fa-caret-down" ng-hide="order === by && reverse"></i>'+'</div>'+
                        '</a>',
                
//                template:
//                        '<a ng-click="onClick()">' +
//                        '<span ng-transclude></span>' +
//                        '<i class="fa fa-caret-up" ng-hide="order === by && !reverse"></i> <i  class="fa fa-caret-down" ng-hide="order === by && reverse"></i>'+
//                        '</a>',
                scope: {
                    order: '=',
                    by: '=',
                    reverse: '='
                },
                link: function (scope, element, attrs) {
                    scope.onClick = function () {
                        if (scope.order === scope.by) {
                            scope.reverse = !scope.reverse
                        } else {
                            scope.by = scope.order;
                            scope.reverse = false;
                        }
                    }
                }
            }
    };
    angular.module('coreModule')
            .directive('ngSort',directive);
}());