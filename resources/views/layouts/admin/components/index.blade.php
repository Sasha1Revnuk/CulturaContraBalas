<!doctype html>
<html lang="{{app()->getLocale()}}" mode="{{$userAdminSettings['theme']}}">

<head>

    <meta charset="utf-8"/>
    <title>{{isset($meta['pageTitle']) ? $meta['pageTitle'] . ' - ' . env('APP_NAME') : env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- Bootstrap Css -->
    @if($userAdminSettings['theme'] == 'dark')
        <link href="{{asset('/adm/css/bootstrap-dark.min.css')}}" id="bootstrap-style" rel="stylesheet"
              type="text/css"/>
    @else
        <link href="{{asset('/adm/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    @endif
    <!-- Icons Css -->
    <link href="{{asset('/adm/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    @if($userAdminSettings['theme'] == 'dark')
        <link href="{{asset('/adm/css/app-dark.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
    @else
        <link href="{{asset('/adm/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
    @endif

    <link href="{{asset('/adm/custom/styles.css')}}" type="text/css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link href="{{asset('/adm/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    <script src="https://cdn.tiny.cloud/1/91iyl5whtxd78nypdrljk3f1p0zukoid0f49ku2nr7pqgsop/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    @yield('systemStyles')
    @yield('styles')
</head>
<body @if($userAdminSettings['theme'] == 'dark') data-sidebar="dark"
      @endif data-sweetalert-type="{{session()->get('sweetAlert')['type'] ?? ''}}"
      data-sweetalert-title="{!! session()->get('sweetAlert')['title'] ?? '' !!}"
      data-sweetalert-message="{!! session()->get('sweetAlert')['message'] ?? '' !!}">
<!-- data-sidebar="dark" -->

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">


    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="/" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/adm/custom/logo.svg" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="/adm/custom/logo-dark.svg" alt="" height="30">
                                </span>
                    </a>

                    <a href="/" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/adm/custom/logo-light-small.svg" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="/adm/custom/logo-light.svg" alt="" height="30">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div class="dropdown dropdown-mega d-none d-lg-block ms-2">

                </div>
            </div>

            <div class="d-flex">
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img id="header-lang-img"
                             src="{{asset('/adm/custom/flags/' . \App\Services\LanguageService::getLanguagePhoto()[app()->getLocale()])}}"
                             alt="{{app()->getLocale()}}" height="16">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        @foreach(\App\Services\LanguageService::LANGUAGES as $language)
                            @if($language != app()->getLocale())
                                <a href="/setlocale/{{$language}}" class="dropdown-item notify-item language"
                                   data-lang="{{$language}}">
                                    <img
                                        src="{{asset('/adm/custom/flags/' . \App\Services\LanguageService::getLanguagePhoto()[$language])}}"
                                        alt="{{$language}}" class="me-1" height="12"> <span
                                        class="align-middle">{{\App\Services\LanguageService::getLangualgeTitle()[$language]}}</span>
                                </a>
                            @endif
                        @endforeach

                    </div>
                </div>

                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <x-admin.button
                        type="button"
                        class="header-item noti-icon waves-effect"
                        :customAttributes="[
                           'data-toggle' => 'fullscreen'
                        ]">
                        <i class="bx bx-fullscreen"></i>
                    </x-admin.button>
                    <x-admin.button
                        type="button"
                        class="header-item noti-icon waves-effect programPhotosShow"
                    >
                        <i class="bx bx-image-alt"></i>
                    </x-admin.button>

                </div>
                <div class="dropdown  d-sm-none  ms-1">
                    <x-admin.button
                        type="button"
                        class="header-item noti-icon waves-effect programPhotosShow"
                    >
                        <i class="bx bx-image-alt"></i>
                    </x-admin.button>
                </div>
                {{--            NOTIFICATIONS--}}
                {{--                <div class="dropdown d-inline-block">--}}
                {{--                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"--}}
                {{--                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--                        <i class="bx bx-bell bx-tada"></i>--}}
                {{--                        <span class="badge bg-danger rounded-pill">3</span>--}}
                {{--                    </button>--}}
                {{--                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"--}}
                {{--                         aria-labelledby="page-header-notifications-dropdown">--}}
                {{--                        <div class="p-3">--}}
                {{--                            <div class="row align-items-center">--}}
                {{--                                <div class="col">--}}
                {{--                                    <h6 class="m-0" key="t-notifications"> Notifications </h6>--}}
                {{--                                </div>--}}
                {{--                                <div class="col-auto">--}}
                {{--                                    <a href="#!" class="small" key="t-view-all"> View All</a>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div data-simplebar style="max-height: 230px;">--}}

                {{--                            <a href="javascript: void(0);" class="text-reset notification-item">--}}
                {{--                                <div class="d-flex">--}}
                {{--                                    <div class="flex-grow-1">--}}
                {{--                                        <h6 class="mb-1">James Lemire</h6>--}}
                {{--                                        <div class="font-size-12 text-muted">--}}
                {{--                                            <p class="mb-1" key="t-simplified">It will seem like simplified English.</p>--}}
                {{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </a>--}}

                {{--                        </div>--}}
                {{--                        <div class="p-2 border-top d-grid">--}}
                {{--                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">--}}
                {{--                                <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View All..</span>--}}
                {{--                            </a>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                             src="{{$userAdminSettings['theme'] == "dark" ? asset('/adm/custom/logo-light-small.svg') : asset('/adm/custom/logo.svg')}}">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{auth()->user()->full_name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        {{--                        <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>--}}
                        {{--                        <div class="dropdown-divider"></div>--}}
                        <a class="dropdown-item text-success" href="{{route('admin.userSettings.index')}}"><i
                                class="bx bx-user font-size-16 align-middle me-1 text-success"></i> <span
                                key="t-settigns">{{__('layout.settingsUser')}}</span></a>
                        <a class="dropdown-item text-danger" href="/logout"><i
                                class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                key="t-logout">{{__('layout.logout')}}</span></a>
                    </div>
                </div>

                {{--                <div class="dropdown d-inline-block">--}}
                {{--                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">--}}
                {{--                        <i class="bx bx-cog bx-spin"></i>--}}
                {{--                    </button>--}}
                {{--                </div>--}}

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    @include('layouts.admin.components.left-menu')
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"> {{$meta['pageTitle'], env('APP_NAME')}}</h4>

                            <div class="page-title-right">
                                @include('layouts.admin.components.breadcrumbs')
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @yield('content')
                <!-- end row -->
            </div>
            <!-- container-fluid -->

            {{--Images modal--}}
            <x-admin.modal
                :withHeader="true"
                :withFooter="true"
                id="programPhotos"
                modalDialogClass="modal-xl"
                :customAttributes="[]"
            >
                <x-slot name="header">{{__('admin.programPhotos.title')}}</x-slot>
                <x-slot name="body">
                    <div class="programPhotoContainer">

                    </div>
                </x-slot>
                <x-slot name="footer">

                </x-slot>

            </x-admin.modal>
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © <a href="https://isitlab.com" target="_blank">ISITLab</a>.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by <a href="https://isitlab.com" target="_blank">ISITLab</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0"/>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('/adm/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/adm/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/adm/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('/adm/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('/adm/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('/adm/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('adm/libs/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- App js -->
<script src="{{asset('/adm/js/pages/app.js')}}"></script>
@yield('systemScripts')
@yield('scripts')
<script src="/adm/js/programPhotos/main.js"></script>
<script src="/adm/js/scripts.js"></script>

<?php

if (auth()->guard()->check()): ?>
<script>
    window.apiToken = "<?php
                           echo e(auth()->user()->api_token); ?>";
    window.authHeaders = {
        Authorization: 'Bearer ' + apiToken
    }
    window.formUrlEncoded = {
        'Content-Type': 'application/x-www-form-urlencoded'
    }
    window.applicationJson = {
        'Content-Type': 'application/json'
    }
    window.admineptJson = {
        "adminept": "application/json,text/*;q=0.99"
    }
    window.language = $('html').attr('lang') == 'es' ? '' : '/' + $('html').attr('lang')
    window.lang = $('html').attr('lang')

</script>
<?php
endif; ?>
</body>

</html>
