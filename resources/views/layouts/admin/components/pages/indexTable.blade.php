@extends('layouts.admin.components.index')
@section('systemStyles')
    <link href="{{asset('adm/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('adm/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-md-between justify-content-center flex-column flex-md-row pt-3 pt-md-0" >
                    <div class="tableLeftButtons">
                        @yield('headerButtonsLeft')
                    </div>

                    <div class="tableRightButtons">
                        @yield('headerButtonsRight')
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @yield('filters')
                </div>
                <div class="row">
                    <div class="col-12">
                        @yield('table')
                    </div>
                </div>
                @yield('additionContent')
            </div>
        </div>
    </div> <!-- end col -->
</div>
@yield('modals')
@endsection
@section('systemScripts')
    <script src="{{asset('adm/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adm/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adm/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adm/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
@endsection



