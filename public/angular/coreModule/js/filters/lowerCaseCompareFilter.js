(function(){
  var filter = function(){
      return function(items,item,prop){
          var exists = false;
          angular.forEach(items,function(itm){
              if(itm[prop].toLowerCase() === item[prop].toLowerCase()){
                  exists = true;
              }
          })
          return exists;
      }
  }  
  angular.module('coreModule')
          .filter('lowerCaseCompare',filter)
}())