<x-admin.card :withHeader="true" :withFooter="isset($user)">
    <x-slot name="header"
            class="text-center">
        {{__('admin.users.mainInfo')}}
    </x-slot>
    <x-slot name="body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mb-2">
                <x-admin.form.simple.input
                    field="name"
                    label="{{__('admin.users.name')}}"
                    id="name"
                    :required="true"
                    :model="$user ?? null"
                >
                </x-admin.form.simple.input>
            </div>
            <div class="col-md-10 mb-2">
                <x-admin.form.simple.input
                    field="surname"
                    label="{{__('admin.users.surname')}}"
                    id="surname"
                    :required="true"
                    :model="$user ?? null"

                >
                </x-admin.form.simple.input>
            </div>
            <div class="col-md-10 mb-2">
                <x-admin.form.simple.input
                    field="father_name"
                    label="{{__('admin.users.father_name')}}"
                    id="father_name"
                    :required="true"
                    :model="$user ?? null"

                >
                </x-admin.form.simple.input>
            </div>
            <div class="col-md-10 mb-2">
                <x-admin.form.simple.input
                    class="input-email"
                    field="email"
                    label="{{__('admin.users.email')}}"
                    id="email"
                    :required="true"
                    :model="$user ?? null"

                >
                </x-admin.form.simple.input>
            </div>

            <div class="col-md-10 mb-2">
                <x-admin.form.simple.input
                    class="input-phone"
                    field="phone"
                    label="{{__('admin.users.phone')}}"
                    id="phone"
                    :required="false"
                    :model="$user ?? null"

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


