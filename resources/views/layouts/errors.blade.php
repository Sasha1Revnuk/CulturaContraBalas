<!doctype html>
<html lang="{{app()->getLocale()}}">

<head>

    <meta charset="utf-8"/>
    <title>@yield('title'){{' - ' . env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- Bootstrap Css -->

    <link href="{{asset('/adm/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('/adm/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->

    <link href="{{asset('/adm/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tiny.cloud/1/91iyl5whtxd78nypdrljk3f1p0zukoid0f49ku2nr7pqgsop/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <link href="{{asset('/adm/custom/styles.css')}}" type="text/css" rel="stylesheet"/>

    @yield('systemStyles')
    @yield('styles')
</head>

<body><!-- data-sidebar="dark" -->

<div class="account-pages my-5 pt-5">
    <div class="container">
        @yield('content')
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{asset('/adm/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/adm/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/adm/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('/adm/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('/adm/libs/node-waves/waves.min.js')}}"></script>


<!-- App js -->
<script src="{{asset('/adm/js/pages/app.js')}}"></script>

</body>
</html>

