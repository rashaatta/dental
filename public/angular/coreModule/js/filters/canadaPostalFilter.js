(function(){
  var filter = function(){
      return function(postalcode){
          if (angular.isDefined(postalcode) && postalcode !== null && postalcode !== '') {
                postalcode = postalcode.replace(/[\W_]+/g, '')
            }
            return postalcode.toUpperCase().substr(0,3)+' '+postalcode.toUpperCase().substr(3)
      }
  }  
  angular.module('coreModule')
          .filter('canadaPostal',filter)
}())