(function () {
    var factory = function ($http) {
        var message = {
            loadModule: 'Initializing module .. please wait',
            loadGrid: 'Fetching data .. Please wait',
        }

        var en_staff = {
            'header': 'Manage Doctors',
            'name': 'Name',
            'address': 'Address ',
            'mobile': 'Mobile ',
            'telephone': 'Telephone ',
            'specialty': 'Specialty ',
            'salary': 'Salary',
            'percent': 'Percent ',
            'session_duration': 'Session Duration(Min)',
            'entry_time': 'Entry Time',
            'exit_time': 'Exit Time',
            'btnSave': 'Save',
            'btnCancel': 'Cancel',
            'workdays': 'Working Days'
        };
        var ar_staff = {
            'header': 'الاطباء',
            'name': 'الاسم',
            'address': 'العنوان',
            'mobile': 'الموبايل',
            'telephone': 'الهاتف',
            'specialty': 'التخصص',
            'salary': 'الراتب الشهرى',
            'percent': 'النسبة',
            'session_duration': 'مدةالجلسة',
            'entry_time': 'وقت الدخول',
            'exit_time': 'وقت الخروج',
            'workdays': 'أيام العمل',
            'btnSave': 'حفظ',
            'btnCancel': 'الغاء'
        };


        var en_login = {
            'header': 'Login',
            'email': 'E-Mail Address',
            'name': 'User Name',
            'password': 'Password',
            'submit': 'Login',
            'forgotpassword': 'Forgot Your Password?',
            'remember': 'Remember Me'
        };
        var ar_login = {
            'header': 'الدخول',
            'email': 'اسم المستخدم',
            'name': 'اسم المستخدم',
            'password': 'كلمة المرور',
            'submit': 'دخول',
            'forgotpassword': 'نسيت كلمة السر؟',
            'remember': 'نذكرنى'
        };

        var en_patient = {
            'header': 'Manage Patients',
            'name': 'Patient Name',
            'address': 'Address ',
            'mobile': 'Mobile ',
            'telephone': 'Telephone ',
            'corporation': 'Corporation',
            'birthday': 'Birthday',
            'btnSave': 'Save',
            'btnCancel': 'Cancel',
            'job': 'Job'
        };

        var ar_patient = {
            'header': 'المرضى',
            'name': 'اسم المريض',
            'address': 'العنوان',
            'mobile': 'الموبايل',
            'telephone': 'الهاتف',
            'corporation': 'الجهة التابع لها',
            'birthday': 'تاريخ الميلاد',
            'job': 'الوظيفه',
            'btnSave': 'حفظ',
            'btnCancel': 'الغاء'
        }

        return {
            getMessage: function (code) {
                return message[code];
            },
            getStaffLabels: function () {
                if (currentLang == 'en') {
                    return en_staff;
                }
                else if (currentLang == 'ar') {
                    return ar_staff;
                }
            },
            getLoginLabels: function () {
                if (currentLang == 'en') {
                    return en_login;
                }
                else if (currentLang == 'ar') {
                    return ar_login;
                }

            }
            ,
            getPatientLabels: function () {
                if (currentLang == 'en') {
                    return en_patient;
                }
                else if (currentLang == 'ar') {
                    return ar_patient;
                }

            }

        }
    }
    factory.$inject = ['$http']
    angular.module('constantModule')
        .factory('constantService', factory)
}())
