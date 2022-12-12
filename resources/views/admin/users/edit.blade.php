@extends('layouts.admin.components.pages.indexClear')
@section('styles')
@endsection

@section('pageContent')
    @include('layouts.admin.includes.formPage.errors')
    <div class="row">
        @if(auth()->user()->hasDirectPermission(\App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_INFO_USER))
            <div class="col-md-6">
                <form method="post" action="{{route('admin.users.update', ['user' => $user])}}"
                      enctype="multipart/form-data"
                      @if($errors->any()) class="needs-validation was-validated" @endif>
                    @csrf
                    @include('admin.users.includes.__main')
                </form>
            </div>
        @endif
        @if(auth()->user()->hasDirectPermission(\App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_PASSWORD_USER))
            <div class="col-md-6">
                <form method="post" action="{{route('admin.users.changePassword', ['user' => $user])}}"
                      enctype="multipart/form-data"
                      @if($errors->any()) class="needs-validation was-validated" @endif>
                    @csrf
                    @include('admin.users.includes.__password')
                </form>
            </div>
        @endif
    </div>
    @if(auth()->user()->hasDirectPermission(\App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_ROLES_AND_PERMISSIONS_USER))
        <form method="post" action="{{route('admin.users.changeRoles', ['user' => $user])}}"
              enctype="multipart/form-data"
              @if($errors->any()) class="needs-validation was-validated" @endif>
            @csrf
            <div class="row">
                @include('admin.users.includes.__roles_and_permissions')
            </div>
        </form>
    @endif

@endsection

@section('modals')
@endsection

@section('scripts')
    <script src="{{asset('adm/libs/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="/adm/js/userAdd.js"></script>
@endsection
