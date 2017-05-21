(function(){
    var filter = function(){
      return function(items,fields,filters){
          return items
      }
  }  
  filter.$inject = ['$filter']
  angular.module('coreModule')
          .filter('complexFilter',filter)
}())