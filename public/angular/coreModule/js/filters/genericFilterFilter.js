(function(){
    var filter = function($filter){
        return function(value,source){
            return $filter('filter')(source,{id: value},true)[0].name
        }
    }
    filter.$inject = ["$filter"]
    angular.module('coreModule')
            .filter('genericFilter',filter)
}())