<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title'){{' - ' . env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link href="{{asset('/adm/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('/adm/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('/adm/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>

</head>

<body>

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        @yield('content')
    </div>
</div>

<script src="{{asset('/adm/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/adm/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/adm/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('/adm/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('/adm/libs/node-waves/waves.min.js')}}"></script>


<!-- validation init -->
<script src="{{asset('/adm/js/pages/validation.init.js')}}"></script>


<!-- App js -->
<script src="{{asset('/adm/js/pages/app.js')}}"></script>

</body>
</html>
