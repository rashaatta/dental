
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <title>@lang('welcome.name')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
{{--<link type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />--}}
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
<body ng-app="dentalApp">
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
                            <a href="/staff">@lang('welcome.staff')</a>
                        </li>
                        <li class="dropdown">
                            <a href="/patient">@lang('welcome.patients')
                            </a>
                        </li>
                        <li class="dropdown"><a href="" class="dropdown-toggle"
                                                data-toggle="dropdown">@lang('welcome.sessions')</a></li>
                        <li class="dropdown"><a href="" class="dropdown-toggle"
                                                data-toggle="dropdown">@lang('welcome.accounting')</a></li>
                    </ul>
            @endif

            <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="login">@lang('welcome.login')</a></li>
                        <li><a href="register">@lang('welcome.register')</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ Config::get('languages')[App::getLocale()] }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <li>
                                            <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="logout"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('welcome.logout')
                                    </a>

                                    <form id="logout-form" action="logout" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>

@yield('content')




<!-- Scripts -->
<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/site.js') }}"></script>
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap.min.js') }}"></script>

<!-- Angular libs -->
<script src="{{ asset('js/angular.min.js') }}"></script>
<script src="{{ asset('js/angular-animate.min.js') }}"></script>
<script src="{{ asset('js/angular-route.min.js') }}"></script>

<!-- Angular files -->
<script src="{{ asset('angular/app.js') }}"></script>
<script src="{{ asset('angular/controllers/mainCtrl.js') }}"></script>

{{--<script type="text/javascript">--}}
    {{--// to remove # from routing URLs--}}
    {{--angular.element(document.getElementsByTagName('head')).append(angular.element('<base href="' + window.location.pathname + '" />'));--}}
{{--</script>--}}

@yield('script')

<script type="text/javascript">
    $(document).ready(function () {

    });
</script>

</body>
</html>
