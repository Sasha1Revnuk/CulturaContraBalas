<!-- Bootstrap -->
<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/helper.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/pe-icon-line.css')}}" rel="stylesheet">
<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
<!-- Default Theme -->
<link rel="stylesheet" href="{{asset('assets/css/owl.theme.css')}}">
<link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon"/>
<style>
    @font-face {
        font-family: 'Lubalin';
        font-style: normal;
        font-weight: 500;
        src: url('{{asset('assets/fonts/ITC_Lubalin_Graph_Std_Medium.woff2')}}');
        /* IE9 Compat Modes */
        src: local(''),
            /* IE6-IE8 */ url('{{asset('assets/fonts/ITC_Lubalin_Graph_Std_Medium.woff2')}}') format('woff2'),
        /* Legacy iOS */
    }
</style>
@yield('styles')