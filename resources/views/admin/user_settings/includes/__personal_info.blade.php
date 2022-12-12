<x-admin.card :withHeader="true" :withFooter="true">
    <x-slot name="header"
            class="text-center">{{__('admin.user_settings.infoSettings')}}</x-slot>
    <x-slot name="body">
        <div class="d-flex flex-column">
            <x-admin.form.simple.input
                field="name"
                :label="__('admin.user_settings.name')"
                :required="true"
                :model="auth()->user()"
            >
            </x-admin.form.simple.input>

            <x-admin.form.simple.input
                field="surname"
                :label="__('admin.user_settings.surname')"
                :required="true"
                :model="auth()->user()"
            >
            </x-admin.form.simple.input>

            <x-admin.form.simple.input
                field="father_name"
                :label="__('admin.user_settings.father_name')"
                :required="false"
                :model="auth()->user()"
            >
            </x-admin.form.simple.input>

            <x-admin.form.simple.input
                class="input-phone"
                field="phone"
                :label="__('admin.user_settings.phone')"
                :required="false"
                :model="auth()->user()"
            >
            </x-admin.form.simple.input>
            <div class="modeArea d-flex justify-content-between">
                <x-admin.form.simple.switch-input
                    formCheckClass=""
                    type="radio"
                    field="mode"
                    :required="true"
                    :checked="($userAdminSettings['theme'] == \App\Enumerators\Admin\AdminSettingsEnumerator::LIGHT_THEME)"
                    label="{{__('layout.light_mode')}}"
                    value="{{\App\Enumerators\Admin\AdminSettingsEnumerator::LIGHT_THEME}}"
                >
                </x-admin.form.simple.switch-input>
                <x-admin.form.simple.switch-input
                    type="radio"
                    field="mode"
                    :required="true"
                    :checked="($userAdminSettings['theme'] == \App\Enumerators\Admin\AdminSettingsEnumerator::DARK_THEME)"
                    label="{{__('layout.dark_mode')}}"
                    value="{{\App\Enumerators\Admin\AdminSettingsEnumerator::DARK_THEME}}"
                >
                </x-admin.form.simple.switch-input>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer" class="border-top text-center">
        <x-admin.button type="submit"
                        class="btn-success"
                        :customAttributes="['id' => 'userInfoSaveButton']">{{__('admin.user_settings.save_info')}}</x-admin.button>
    </x-slot>

</x-admin.card>

