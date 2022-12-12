@extends('layouts.admin.components.pages.indexClear')
@section('styles')
@endsection

@section('pageContent')
    @include('layouts.admin.includes.formPage.errors')
    <form method="post" action="{{route('admin.roles.store')}}" enctype="multipart/form-data"
          @if($errors->any()) class="needs-validation was-validated" @endif>
        @csrf
    </form>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection
