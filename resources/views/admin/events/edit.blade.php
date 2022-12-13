@extends('layouts.admin.components.pages.indexClear')
@section('styles')
@endsection

@section('pageContent')
    @include('layouts.admin.includes.formPage.errors')
    <form method="post" action="{{route('admin.events.update', ['event' => $event])}}" enctype="multipart/form-data"
          @if($errors->any()) class="needs-validation was-validated" @endif>
        @csrf
        <div class="row d-flex ">
            <div class="col-md-4">
                <x-admin.card :withHeader="true" :withFooter="false">
                    <x-slot name="header"
                            class="text-center">{{__('admin.events.info')}}</x-slot>
                    <x-slot name="body">
                        <div class="form-group">
                            <x-admin.form.simple.input
                                    field="slug"
                                    label="Slug"
                                    id="slug"
                                    :disabled="true"
                                    value="{{$event->slug}}"
                                    :customAttributes="[]"
                            >
                            </x-admin.form.simple.input>
                        </div>
                        <div class="form-group">
                            <x-admin.form.simple.input
                                    type="file"
                                    field="image"
                                    label="{{__('admin.events.image')}}"
                                    id="image"
                                    :customAttributes="[]"
                            >
                            </x-admin.form.simple.input>
                        </div>
                        @if($event->image_url)
                            <div class="form-group">
                                <img class="img-fluid" alt="" src="{{$event->image_url}}" width="145">
                            </div>
                        @endif


                    </x-slot>
                    <x-slot name="footer" class="border-top text-center">

                    </x-slot>

                </x-admin.card>


            </div>
            <div class="col-md-8">
                <x-admin.card :withHeader="true" :withFooter="true">
                    <x-slot name="header"
                            class="text-right">{{__('admin.system.edit')}}</x-slot>
                    <x-slot name="body">
                        @include('admin.events.__form', ['eventTranslations' => $event->translations])

                    </x-slot>
                    <x-slot name="footer" class="border-top text-center">
                        <x-admin.button
                                type="submit"
                                class="btn-success"
                                :customAttributes="[]">{{__('admin.system.save')}}
                        </x-admin.button>
                    </x-slot>

                </x-admin.card>

            </div>
        </div>


    </form>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection
