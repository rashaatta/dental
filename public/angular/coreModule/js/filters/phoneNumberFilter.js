(function () {
    var filter = function () {
        return function (phone) {
            phone = phone.toString().trim();
            var newphone;
            if (angular.isDefined(phone) && phone !== null && phone !== '') {
                phone = phone.replace(/\D/g, '')
            }
            if(phone.length > 10){
                newphone = phone.substr(0,3)+' '+phone.substr(3,3)+' '+phone.substr(6,4)+' '+phone.substr(10)
            } else if(phone.length == 10) {
                newphone = '('+phone.substr(0,3)+')'+' '+phone.substr(3,3)+'-'+phone.substr(6)
            }
            else {
                newphone = phone
            }
            return newphone
        }
    }
    angular.module('coreModule')
            .filter('phoneNumber', filter)
}())