(function(){
    var filter = function(){
        return function(string){
            if(string.length > 0){
                return string.replace(/\.[a-z]{3,4}$/,"")
            }else{
                return string
            }
        }
    }
    angular.module('coreModule')
            .filter('stripExtension',filter)
}())