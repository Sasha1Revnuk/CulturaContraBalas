@if($errors->any())
    <div class="row">
        <div class="col-md-12">
            @foreach($errors->all() as $error)
                <x-admin.alert
                    type="danger"
                    withClose="true"
                    :customAttributes="[]"
                >
                    {{$error}}
                </x-admin.alert>
            @endforeach
        </div>
    </div>
@endif
