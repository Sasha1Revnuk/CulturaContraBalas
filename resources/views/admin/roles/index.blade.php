@extends('layouts.admin.components.pages.indexTable')
@section('styles')
@endsection
@section('headerButtonsLeft')
    @if(auth()->user()->hasDirectPermission(\App\Enumerators\Admin\RolesEnumerator::PERMISSION_CREATE_ROLE))
        <a href="{{route('admin.roles.create')}}"
           class="btn btn-sm btn-success waves-effect waves-themed"><i class="bx bx-plus"
                                                                       aria-hidden="true"></i> {{__('admin.system.create')}}
        </a>
    @endif
@endsection

@section('headerButtonsRight')

@endsection

@section('filters')
    <div class="row">
        <div class="col-md-2  mb-2">
            <div class="form-group ">
                <x-admin.form.simple.input
                    :label="__('admin.roles.search')"
                    class="keyup"
                    type="text"
                    field="search"
                    id="search"
                    :customAttributes="['placeholder' => __('admin.system.search')]"
                >
                </x-admin.form.simple.input>
            </div>
        </div>
    </div>
@endsection

@section('table')
    <table id="models"
           class="table align-middle table-nowrap"
           role="grid">
        <thead>
        <tr>
            <th>{{__('admin.roles.name')}}</th>
            <th>{{__('admin.system.actions')}}</th>
        </tr>
        </thead>
    </table>
@endsection

@section('additionContent')
@endsection

@section('modals')
@endsection

@section('scripts')
    <script src="/adm/js/roles.js"></script>
@endsection
