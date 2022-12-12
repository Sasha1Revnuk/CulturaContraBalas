@extends('layouts.admin.components.pages.indexTable')
@section('styles')
@endsection
@section('headerButtonsLeft')
    @if(auth()->user()->hasDirectPermission(\App\Enumerators\Admin\RolesEnumerator::PERMISSION_CREATE_USER))
        <a href="{{route('admin.users.create')}}"
           class="btn btn-sm btn-success waves-effect waves-themed"><i class="bx bx-plus"
                                                                       aria-hidden="true"></i> {{__('admin.system.create')}}
        </a>
    @endif

@endsection
@section('filters')
    <div class="row">
        <div class="col-md-3  mb-2">
            <x-admin.form.simple.input
                :label="__('admin.users.searchPlaceholder')"
                class="keyup"
                type="text"
                field="search"
                id="search"
                :customAttributes="['placeholder' => __('admin.users.searchPlaceholder')]"
            >
            </x-admin.form.simple.input>
        </div>
        <div class="col-md-3 mb-2">
            <x-admin.form.simple.select
                field="roleSelect"
                label="{{__('admin.users.role')}}"
                id="roleSelect"
                class="change"
            >
                <option value="">-</option>
                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                    @if(\App\Enumerators\Admin\RolesEnumerator::ROLE_SUPER_ADMINISTRATOR !== $role->name)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                    @endif
                @endforeach
            </x-admin.form.simple.select>
        </div>
        <div class="col-md-3 mb-2">
            <x-admin.form.simple.select
                class="change"
                field="permissionSelect"
                label="{{__('admin.users.permission')}}"
                id="permissionSelect"
            >
                <option value="">-</option>
                @foreach(\Spatie\Permission\Models\Permission::all() as $permission)
                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                @endforeach
            </x-admin.form.simple.select>
        </div>

    </div>
@endsection

@section('table')
    <table id="models"
           class="table align-middle table-nowrap"
           role="grid">
        <thead>
        <tr>
            <th>#ID</th>
            <th>{{__('admin.users.pip')}}</th>
            <th>Email</th>
            <th>{{__('admin.users.phone')}}</th>
            <th>{{__('admin.users.roles')}}</th>
            <th>{{__('admin.users.permissions')}}</th>
            <th>{{__('admin.users.actions')}}</th>
        </tr>
        </thead>
    </table>
@endsection

@section('additionContent')
@endsection

@section('modals')
@endsection

@section('scripts')
    <script src="/adm/js/users.js"></script>
@endsection
