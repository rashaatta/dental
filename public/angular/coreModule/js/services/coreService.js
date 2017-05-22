(function () {
    var factory = function ($http) {
        var service = {
            currentState: null,
            previousState: null,
            currentParams: null,
            privileges: null,
            user: null,
            states: [],
            api: null,
            baseUrl: null,
            version: null,
            alerts: [],
            photolib: null,
            workorder: null,
            manual: null,
            salesrep: null,
            sysadmin_users: null,
            sysadmin_groups: null,
            sysadmin_messages: null,
            sysadmin_logs: null,
            warnings: null,
            profileData: null
        }
        var alertSet = function (alert) {
            var m
            var type
            switch (alert.type) {
            case "exception":
                m = 'Exception: ';
                angular.forEach(alert.message, function (value, key) {
                    if (key !== 'type') {
                        if (key === 'file') {
                            m += key + ':' + value.replace(/\/data\/www\/api\//, '') + ' ';
                        } else
                            m += key + '' + value + '';
                    }
                });
                type = 'danger';
                break;
            case "error":
                m = alert.message;
                type = 'danger';
                break;
            case "success":
            case "info":
                m = alert.message;
                type = 'success';
                break;
            case "wait":
                m = alert.message;
                type = 'info';
                break;
            }
            return {
                type: type,
                message: m,
                timeout: type === 'info' || type === 'success' ? 5000 : 1000000
            }
        }
        return {
            clearAll: function () {
                angular.forEach(service, function (val, key) {
                    if (Array.isArray(val)) {
                        service[key] = []
                    } else {
                        if (key !== 'api' && key !== 'baseUrl' && key !== 'version')
                            service[key] = null
                    }
                })
            },
            setLang: function (val) {
                service.Lang = val
            },
            getLang: function () {
                return service.Lang;
            },
            setCurrentState: function (val) {
                service.currentState = val
            },
            getCurrentState: function () {
                return service.currentState
            },
            setPreviousState: function (val) {
                service.previousState = val
            },
            getPreviousState: function () {
                return service.previousState
            },
            setCurrentParams: function (val) {
                service.currentParams = val
            },
            getCurrentParams: function () {
                return service.currentParams
            },
            setDB: function (val) {
                service[service.currentState.replace(".", '_')] = val
            },
            getDB: function () {
                return service[service.currentState.replace(".", '_')]
            },
            getParentDB: function (parent) {
                return service[parent]
            },
            setPrivileges: function (val) {
                service.privileges = val
            },
            getPrivileges: function () {
                return service.privileges
            },
            setUser: function (val) {
                service.user = val
            },
            getUser: function () {
                return service.user
            },
            setStates: function (val) {
                service.states = val
            },
            getStates: function () {
                return service.states
            },
            setApi: function (val) {
                service.api = val
            },
            getApi: function () {
                return service.api
            },
            setBaseUrl: function (val) {
                service.baseUrl = val
            },
            getBaseUrl: function () {
                return service.baseUrl
            },
            setVersion: function (val) {
                service.version = val
            },
            getVersion: function () {
                return service.version
            },
            setAlert: function (val) {
                service.alerts.push(alertSet(val))
            },
            getAlert: function () {
                return service.alerts
            },
            resetAlert: function () {
                service.alerts = []
            },
            filterRecords: function (post) {
                return $http.post(service.api + 'filter', post)
            },
            getUuid: function () {
                return $http.get(service.api + 'uuid')
            },
            setWarnings: function (val) {
                service.warnings.push(val)
            },
            getWarnings: function () {
                return service.warnings
            },
            resetWarnings: function () {
                service.warnings = null
            },
            removeWarning: function (val) {
                service.warnings.splice(service.warnings.indexOf(val), 1)
            },
            zipCollection: function (collection, module) {
                var post = {
                    db: module,
                    collection: collection
                }
                return $http.post(service.api + 'zipcollection', post)
            },
            getCanDel: function (module) {
                switch (module) {
                case "workorder":
                    if (service.privileges.woadmin === true || service.privileges.wodel === true)
                        return true
                    else
                        return false
                    break;
                case "photolib":
                    if (service.privileges.photoadmin === true)
                        return true
                    else
                        return false
                    break;
                case "manual":
                    if (service.privileges.manadmin === true || service.privileges.mandel === true)
                        return true
                    else
                        return false
                    break;
                case "hr":
                    if (service.privileges.hradmin === true || service.privileges.hrdel === true)
                        return true
                    else
                        return false
                    break;
                case "proc":
                    if (service.privileges.procadmin === true || service.privileges.procdel === true)
                        return true
                    else
                        return false
                    break;
                case "repo":
                    if (service.privileges.repoadmin === true || service.privileges.repodel === true)
                        return true
                    else
                        return false
                    break;
                case "ops":
                    if (service.privileges.opsadmin === true || service.privileges.opsdel === true)
                        return true
                    else
                        return false
                    break;
                }
            },
            getTableProfiles: function (module) {
                return $http.get(service.api + 'tableprofiles/' + module + '/' + service.user.user_id)
            },
            writeTableProfile: function (profile) {
                return $http.post(service.api + 'tableprofile', profile)
            },
            updateTableProfile: function (profile) {
                return $http.put(service.api + 'tableprofile', profile)
            },
            deleteTableProfile: function(profileid){
                return $http.delete(service.api+'tableprofile/'+profileid);
            },
            exportData: function(post){
                return $http.post(service.api+'export',post)
            },
            getTerritoryId: function (territory) {
                return $http.get(service.api + 'territoryid/' + territory)
            },
            getPhoneTypes: function () {
                return $http.get(service.api + 'phonetypes')
            },
            getAddressTypes: function () {
                return $http.get(service.api + 'addresstypes')
            },
            getEmailTypes: function () {
                return $http.get(service.api + 'emailtypes')
            },
            getCountries: function () {
                return $http.get(service.api + 'salesrepcountries')
            },
            getCountryStates: function (countryid) {
                return $http.get(service.api + 'salesrepstates/' + countryid)
            },
            getCities: function (stateid) {
                return $http.get(service.api + 'salesrepcities/' + stateid)
            },
            addCity: function (city) {
                return $http.post(service.api + 'addcity', city)
            },
            getAllTechs: function(){
                return $http.get(service.api + 'getalltechs');
            },
            getSalesEmails: function(type,salesoffice){
                return $http.get(service.api + 'getsalesemails/'+type+'/'+salesoffice);
            },
            setProfileData: function(profileData){
                service.profileData = profileData;
            },
            getProfileData: function(){
                return service.profileData;
            }
        }
    }
    factory.$inject = ['$http']
    angular.module('coreModule')
        .factory('coreService', factory)
}())