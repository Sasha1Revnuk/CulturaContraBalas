@extends('layouts.errors')
@section('title')
    500
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center mb-5">
                <h1 class="display-2 fw-medium">5<i class="bx bx-buoy bx-spin text-primary display-3"></i>0</h1>
                <h4 class="text-uppercase">{{__('admin.validations.500')}}</h4>
                <div class="mt-5 text-center">
                    <a class="btn btn-primary waves-effect waves-light"
                       href="/">{{__('admin.validations.back_to_main')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-xl-6">
            <div>
                <img src="{{asset('/adm/images/error-img.png')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
@endsection
