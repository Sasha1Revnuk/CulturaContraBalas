<div class="col-md-3">
    <x-admin.card :withHeader="true" :withFooter="true">
        <x-slot name="header"
                class="text-center">{{__('admin.users.rolesAndPermissions')}}</x-slot>
        <x-slot name="body">
            <div class="row">
                @foreach($availableRoles as $role)
                    <div class="col-md-12">
                        <x-admin.form.simple.switch-input
                            class="roleInput"
                            type="checkbox"
                            :checked="isset($user) ? $user->hasRole($role) : false"
                            field="roles[]"
                            label="{{$role}}"
                            id="role-{{$role}}"
                            value="{{$role}}"
                        >
                        </x-admin.form.simple.switch-input>
                    </div>
                @endforeach
            </div>
        </x-slot>

        <x-slot name="footer" class="border-top d-flex justify-content-center">
            @if(isset($user))
                <x-admin.button
                    type="submit"
                    class="btn-success"
                >
                    {{__('admin.system.save')}}
                </x-admin.button>
            @else
                <x-admin.button
                    type="submit"
                    class="btn-success"
                    :customAttributes="[]">{{__('admin.system.add')}}
                </x-admin.button>
            @endif
        </x-slot>

    </x-admin.card>

</div>
<div class="col-md-9">
    <x-admin.card :withHeader="false" :withFooter="false">

        <x-slot name="body">
            <div class="row">
                @foreach($availablePermissionGroups as $group => $permission)
                    <div class="col-md-4">
                        <x-admin.card class="border border-primary" :withHeader="true" :withFooter="false">
                            <x-slot name="header"
                                    class="text-center bg-transparent border-primary">{{$group}}</x-slot>
                            <x-slot name="body">
                                @foreach($permission as $title => $dataAttribute)
                                    <x-admin.form.simple.switch-input
                                        class="{{$dataAttribute}}"
                                        type="checkbox"
                                        :checked="isset($user) ? $user->hasDirectPermission($title) : false"
                                        field="permissions[]"
                                        label="{{$title}}"
                                        id="permission-{{$title}}"
                                        value="{{$title}}"
                                    >
                                    </x-admin.form.simple.switch-input>
                                @endforeach

                            </x-slot>


                        </x-admin.card>

                    </div>
                @endforeach
            </div>
        </x-slot>


    </x-admin.card>

</div>
