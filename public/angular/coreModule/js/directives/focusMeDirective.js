(function(){
  var directive = function($timeout){
      return {
          restrict: 'AC',
          link: function(scope,elm){
              $timeout(function(){
                  elm[0].focus()
              },0)
          }
      }
  }  
  directive.$inject = ['$timeout']
  angular.module('coreModule')
          .directive("focusMe",directive)
}())