@extends('layouts.admin.components.pages.indexClear')
@section('styles')
@endsection

@section('pageContent')
    <div class="row d-flex flex-column ">
        <div class="col-md-4 mb-5 align-self-center">
            <form action="{{route('admin.userSettings.storePassword')}}" method="post"
                  @error('old_password', 'password') class="needs-validation was-validated" @enderror>
                @csrf
                @include('admin.user_settings.includes.__password_info')
            </form>
        </div>

        <div class="col-md-4 mb-5 align-self-center">
            <form action="{{route('admin.userSettings.storeInfo')}}" method="post"
                  @error('name', 'surname', 'father_name', 'phone', 'mode') class="needs-validation was-validated" @enderror>
                @csrf
                @include('admin.user_settings.includes.__personal_info')
            </form>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection
