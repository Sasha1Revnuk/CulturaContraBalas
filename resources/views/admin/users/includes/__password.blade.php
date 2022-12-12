<x-admin.card :withHeader="true" :withFooter="isset($user)">
    <x-slot name="header"
            class="text-center">{{__('admin.users.secure')}}</x-slot>
    <x-slot name="body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mb-2">
                <x-admin.form.simple.input
                    type="password"
                    field="password"
                    label="{{__('admin.users.password')}}"
                    id="password"
                    :required="true"
                >
                </x-admin.form.simple.input>
            </div>
            <div class="col-md-10 mb-2">
                <x-admin.form.simple.input
                    type="password"
                    field="password_confirmation"
                    label="{{__('admin.users.password_confirmation')}}"
                    id="password_confirmation"
                    :required="true"
                >
                </x-admin.form.simple.input>
            </div>
        </div>
    </x-slot>
    @if(isset($user))
        <x-slot name="footer" class="border-top text-center">
            <x-admin.button
                type="submit"
                class="btn-success"
            >
                {{__('admin.system.save')}}
            </x-admin.button>
        </x-slot>
    @endif

</x-admin.card>
