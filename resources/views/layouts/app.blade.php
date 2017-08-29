<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<base href="/">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <title>@lang('welcome.name')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/angular-datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
<link type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
{{--<link type="text/css" href="{{ asset('css/bootstrap-timepicker.css') }}" />--}}
{{--<link rel="stylesheet/less" type="text/css" href="{{ asset('css/timepicker.less')}}" />--}}
<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    @if (App::getLocale() =='ar')
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/bootstrapRTL.css') }}" rel="stylesheet">
        <link href="{{ asset('css/appRtl.css') }}" rel="stylesheet">
    @endif


    <style type="text/css">
        .modal {
            top: 200px;
        }
    </style>

    <!-- Scripts -->

    <script type="text/javascript">
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


</head>
<body ng-app="dentalApp" ng-controller="CoreController">


<div id="app">
    <nav class="navbar navbar-fixed-top navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="#">
                @lang('welcome.name')
                <!--  {{ config('app.name', 'Laravel') }}-->
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (!Auth::guest())
                    <ul class="nav navbar-nav">
                        &nbsp;<li class="dropdown">
                            <a href=""   data-ui-sref="staff" ng-class="checkActiveUrl('staff')">@lang('welcome.staff')</a>
                        </li>
                        <li class="dropdown">
                            <a href=""  data-ui-sref="patient">@lang('welcome.patients')
                            </a>
                        </li>
                        <li class="dropdown"><a href="" class="dropdown-toggle"
                                                data-toggle="dropdown">@lang('welcome.sessions')</a></li>
                        <li class="dropdown"><a href="" class="dropdown-toggle"
                                                data-toggle="dropdown">@lang('welcome.accounting')</a>
                        </li>
                    </ul>
            @endif

            <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="" data-ui-sref="login">@lang('welcome.login')</a></li>
                        <li><a href="" data-ui-sref="register">@lang('welcome.register')</a></li>
                        <li><a ng-if="'{{ App::getLocale() }}' !== 'en'"
                               href="{{ route('lang.switch', 'en') }}">English</a></li>
                        <li><a ng-if="'{{ App::getLocale() }}' !== 'ar'"
                               href="{{ route('lang.switch', 'ar') }}">عربي</a></li>
                    @else

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="javascript:void(0)" ng-click="doLogout()">
                                        @lang('welcome.logout')
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container">


    @yield('content')


</div>

<!-- Scripts -->
<!-- Scripts -->

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
<script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>


{{--<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/site.js') }}"></script>





<!-- Angular libs -->
<script src="{{ asset('js/angular.min.js') }}"></script>
<script src="{{ asset('js/angular-animate.min.js') }}"></script>
<script src="{{ asset('js/angular-route.min.js') }}"></script>
<script src="{{ asset('js/angular-ui-router.min.js') }}"></script>
<script src="{{ asset('js/ct-ui-router-extras.min.js') }}"></script>
<script src="{{ asset('js/angular-cookies.min.js') }}"></script>
<!-- Angular translate libs -->
<script src="bower_components/angular-translate/angular-translate.js"></script>
<script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
<script src="bower_components/angular-translate-handler-log/angular-translate-handler-log.js"></script>
<script src="bower_components/angular-translate-loader-static-files/angular-translate-loader-static-files.js"></script>
<script src="bower_components/angular-translate-storage-cookie/angular-translate-storage-cookie.js"></script>
<script src="bower_components/angular-translate-storage-local/angular-translate-storage-local.js"></script>

<!--Date Picker-->
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/jquery.timepicker.js') }}"></script>


<!--Date Picker-->

<!-- Angular files -->
<script src="{{ asset('angular/app.js') }}"></script>
<script src="{{ asset('/js/angular-confirm/angular-confirm.min.js') }}"></script>

<!-- Core -->
<script src="{{ asset('angular/coreModule/coreModule.js') }}"></script>
<script src="{{ asset('angular/coreModule/js/controllers/CoreController.js') }}"></script>
<script src="{{ asset('angular/coreModule/js/services/coreService.js') }}"></script>
<script src="{{ asset('angular/coreModule/js/services/coreService.js') }}"></script>


<script src="{{asset('angular/coreModule/js/filters/utcToLocalFilter.js')}}" type="text/javascript"></script>

<!-- auth module -->
<script src="{{ asset('angular/authModule/authModule.js') }}"></script>
<script src="{{ asset('angular/authModule/js/controllers/authController.js') }}"></script>
<script src="{{ asset('angular/authModule/js/services/authService.js') }}"></script>

<!-- auth module -->

<!-- staff module -->
<script src="{{ asset('angular/staffModule/staffModule.js') }}"></script>
<script src="{{ asset('angular/staffModule/js/controllers/staffController.js') }}"></script>
<script src="{{ asset('angular/staffModule/js/services/staffService.js') }}"></script>



<!-- patient module -->
<script src="{{ asset('angular/patientModule/patientModule.js') }}"></script>
<script src="{{ asset('angular/patientModule/js/controllers/patientController.js') }}"></script>
<script src="{{ asset('angular/patientModule/js/services/patientService.js') }}"></script>


<!--  constant Module  -->
<script src="{{ asset('angular/constantModule/constantModule.js') }}"></script>
<script src="{{ asset('angular/constantModule/js/services/constantService.js') }}"></script>
<!--  constant Module  -->

<!--  datatables  -->
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/angular-datatables.js') }}"></script>
<script src="{{ asset('js/datatable/angular-datatables.directive.js') }}"></script>
<script src="{{ asset('js/datatable/angular-datatables.instances.js') }}"></script>
<script src="{{ asset('js/datatable/angular-datatables.util.js') }}"></script>
<script src="{{ asset('js/datatable/angular-datatables.renderer.js') }}"></script>
<script src="{{ asset('js/datatable/angular-datatables.factory.js') }}"></script>
<script src="{{ asset('js/datatable/angular-datatables.options.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.2.0/ui-bootstrap-tpls.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">var baseUrl = "{{ url('/') }}/";</script>

@yield('script')


<script type="text/javascript">

    var currentLang = "{{App::getLocale()}}";

</script>

</body>
</html>
