(function () {
    var factory = function ($http, $cookies) {
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
        };

        var alertSet = function (alert) {
            var m;
            var type;
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
            };
        };

        return {
            isLoggedIn: function(){
                var localUser = angular.fromJson($cookies.get('auth'));
                return (localUser !== undefined && localUser.id > 0);
            },
            clearAll: function () {
                angular.forEach(service, function (val, key) {
                    if (Array.isArray(val)) {
                        service[key] = [];
                    } else {
                        if (key !== 'api' && key !== 'baseUrl' && key !== 'version')
                            service[key] = null;
                    }
                })
            },
            setLang: function (val) {
                service.Lang = val;
            },
            getLang: function () {
                return service.Lang;
            },
            setCurrentState: function (val) {
                service.currentState = val
            },
            getCurrentState: function () {
                return service.currentState;
            },
            setPreviousState: function (val) {
                service.previousState = val;
            },
            getPreviousState: function () {
                return service.previousState;
            },
            setCurrentParams: function (val) {
                service.currentParams = val;
            },
            getCurrentParams: function () {
                return service.currentParams;
            },
            setDB: function (val) {
                service[service.currentState.replace(".", '_')] = val;
            },
            getDB: function () {
                return service[service.currentState.replace(".", '_')];
            },
            getParentDB: function (parent) {
                return service[parent];
            },
            setPrivileges: function (val) {
                service.privileges = val;
            },
            getPrivileges: function () {
                return service.privileges;
            },
            setUser: function (val) {
                service.user = val;
            },
            getUser: function () {
                return service.user;
            },
            setStates: function (val) {
                service.states = val;
            },
            getStates: function () {
                return service.states;
            },
            setApi: function (val) {
                service.api = val;
            },
            getApi: function () {
                return service.api;
            },
            setBaseUrl: function (val) {
                service.baseUrl = val;
            },
            getBaseUrl: function () {
                return service.baseUrl;
            },
            setVersion: function (val) {
                service.version = val;
            },
            getVersion: function () {
                return service.version;
            },
            setAlert: function (val) {
                service.alerts.push(alertSet(val));
            },
            getAlert: function () {
                return service.alerts;
            },
            resetAlert: function () {
                service.alerts = [];
            },
            getUuid: function () {
                return $http.get(service.api + 'uuid');
            },
            setWarnings: function (val) {
                service.warnings.push(val);
            },
            getWarnings: function () {
                return service.warnings;
            },
            resetWarnings: function () {
                service.warnings = null;
            },
            removeWarning: function (val) {
                service.warnings.splice(service.warnings.indexOf(val), 1);
            },
            setProfileData: function(profileData){
                service.profileData = profileData;
            },
            getProfileData: function(){
                return service.profileData;
            }
        }
    };

    factory.$inject = ['$http', '$cookies'];
    angular.module('coreModule')
        .factory('coreService', factory);
}());
