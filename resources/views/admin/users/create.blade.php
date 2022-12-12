@extends('layouts.admin.components.pages.indexClear')
@section('styles')
@endsection

@section('pageContent')
    @include('layouts.admin.includes.formPage.errors')
    <form method="post" action="{{route('admin.users.store')}}" enctype="multipart/form-data"
          @if($errors->any()) class="needs-validation was-validated" @endif>
        @csrf
        <div class="row">
            <div class="col-md-6">
                @include('admin.users.includes.__main')
            </div>
            <div class="col-md-6">
                @include('admin.users.includes.__password')

            </div>
        </div>
        <div class="row">
            @include('admin.users.includes.__roles_and_permissions')
        </div>
    </form>
@endsection

@section('modals')
@endsection

@section('scripts')
    <script src="{{asset('adm/libs/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="/adm/js/userAdd.js"></script>
@endsection
