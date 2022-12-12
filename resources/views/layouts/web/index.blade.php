<!DOCTYPE html>
@php
    $locale = app()->getLocale();
@endphp
<html lang="{{$locale}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.web.header')

    @include('layouts.web.partials.og_header')
</head>

<body>

@yield('content')
</body>

</html>