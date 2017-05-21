(function () {
    var filter = function () {
        return function (items, prop, letters) {
            if (angular.isDefined(items) && items.length) {
                var tempItems = []
                var re = RegExp("^" + letters, 'i')

                if (letters.toString().length > 0) {
                    if (Array.isArray(items)) {
                        angular.forEach(items, function (item) {
                            if (item[prop].toString().match(re)) {
                                tempItems.push(item)
                            }
                        })
                        return tempItems
                    }
                } else {
                    return items
                }
            }
            else
                return items
        }
    }
    angular.module('coreModule')
            .filter('startsWith', filter)
}())