@extends('layouts.admin.components.pages.indexClear')
@section('styles')
@endsection

@section('pageContent')
    @include('layouts.admin.includes.formPage.errors')
    <form method="post" action="{{route('admin.stories.store')}}" enctype="multipart/form-data"
          @if($errors->any()) class="needs-validation was-validated" @endif>
        @csrf
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <x-admin.card :withHeader="true" :withFooter="true">
                    <x-slot name="header"
                            class="text-right">{{__('admin.system.add')}}</x-slot>
                    <x-slot name="body">
                        @include('admin.stories.__form', ['storyTranslations' => null])

                    </x-slot>
                    <x-slot name="footer" class="border-top text-center">
                        <x-admin.button
                            type="submit"
                            class="btn-success"
                            :customAttributes="[]">{{__('admin.system.add')}}
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
