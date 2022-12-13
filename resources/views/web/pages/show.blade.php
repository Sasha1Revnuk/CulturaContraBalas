<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.web.partials.headerSeo')
    @include('layouts.web.partials.og_header')
    @include('layouts.web.partials.styles')

    <!-- Include js plugin -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <!--[endif]-->
    <!--[if IE 9]-->
    <link href="{{asset('assets/css/ie.css')}}" rel="stylesheet">
    <!--[endif]-->
    <!--[if IE 10]>
    <link href="{{asset('assets/css/ie.css')}}" rel="stylesheet">
    <![endif]-->
    <!--[if IE 11]>
    <link href="{{asset('assets/css/ie.css')}}" rel="stylesheet">
    <![endif]-->
    <style type="text/css">
        {!! $page->css !!}
    </style>
</head>
<body>
{!! $page->html !!}
<!-- section -->
@include('layouts.web.partials.scripts')

</body>
