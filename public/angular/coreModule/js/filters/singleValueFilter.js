(function(){
  var filter = function(){
      return function(items,propin,propout,value){
          var val = null;
          angular.forEach(items,function(item){
              if(item[propin] === value){
                  val = item[propout]
              }
          })
          return val
      }
  }  
  angular.module('coreModule')
          .filter('singleValue',filter)
}())