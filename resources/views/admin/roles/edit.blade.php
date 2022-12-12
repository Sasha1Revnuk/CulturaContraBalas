@extends('layouts.admin.components.pages.indexClear')
@section('styles')
@endsection

@section('pageContent')
    @include('layouts.admin.includes.formPage.errors')
    <form method="post" action="{{route('admin.roles.update', [$role])}}" enctype="multipart/form-data"
          @if($errors->any()) class="needs-validation was-validated" @endif>
        @csrf
        <div class="row">
            <div class="col-md-3">
                <x-admin.card :withHeader="false" :withFooter="false">

                    <x-slot name="body">
                        <div class="form-group">
                            <x-admin.form.simple.input
                                field="name"
                                label="{{__('admin.roles.name')}}"
                                id="name"
                                :model="$role"
                                :required="true"
                            >
                            </x-admin.form.simple.input>
                        </div>
                        <div class="form-group ">
                            <x-admin.button
                                type="submit"
                                class="btn-primary"
                                :customAttributes="[]">{{__('admin.system.save')}}
                            </x-admin.button>
                        </div>
                    </x-slot>


                </x-admin.card>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($permissionGroups as $permissionGroup)
                        <div class="col-md-6">
                            <x-admin.card :withHeader="true">
                                <x-slot name="header"
                                        class="text-center">{{$permissionGroup->translations->first()->title}}</x-slot>
                                <x-slot name="body">
                                    <div class="row">
                                        @foreach($permissionGroup->permissions->chunk(2) as $chunckedPermission)
                                            <div class="col-6">
                                                @foreach($chunckedPermission as $permission)
                                                    <x-admin.form.simple.switch-input
                                                        type="checkbox"
                                                        field="permissions[]"
                                                        label="{{$permission->name}}"
                                                        value="{{$permission->name}}"
                                                        id="{{$permission->id}}"
                                                        :checked="$role->hasPermissionTo($permission->name)"
                                                    >
                                                    </x-admin.form.simple.switch-input>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </x-slot>

                            </x-admin.card>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>


    </form>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection
