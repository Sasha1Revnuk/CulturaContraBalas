<x-admin.card :withHeader="true" :withFooter="true">
    <x-slot name="header"
            class="text-center">{{__('admin.user_settings.authSettings')}}</x-slot>
    <x-slot name="body">
        <div class="d-flex flex-column">
            <x-admin.form.simple.input
                    field="old_password"
                    type="password"
                    :label="__('admin.user_settings.old_password')"
                    :required="true"
            >
            </x-admin.form.simple.input>
            <x-admin.form.simple.input
                    field="password"
                    type="password"
                    :label="__('admin.user_settings.password')"
                    :required="true"
            >
            </x-admin.form.simple.input>
            <x-admin.form.simple.input
                    field="password_confirmation"
                    type="password"
                    :label="__('admin.user_settings.password_confirmation')"
                    :required="true"
            >
            </x-admin.form.simple.input>

        </div>
    </x-slot>
    <x-slot name="footer" class="border-top text-center">
        <x-admin.button type="submit"
                        class="btn-success"
                        :customAttributes="['id' => 'userAuthSaveButton']">{{__('admin.user_settings.save_password')}}</x-admin.button>
    </x-slot>

</x-admin.card>





