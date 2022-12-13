@extends('layouts.admin.components.pages.indexTable')
@section('styles')
@endsection
@section('headerButtonsLeft')
    <a href="{{route('admin.stories.create')}}"
       class="btn btn-sm btn-success waves-effect waves-themed"><i class="bx bx-plus"
                                                                   aria-hidden="true"></i> {{__('admin.system.create')}}
    </a>
@endsection


@section('table')
    <table id="models"
           class="table align-middle table-nowrap"
           role="grid">
        <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th></th>
            <th>{{__('admin.stories.name')}}</th>
            <th>{{__('admin.stories.text')}}</th>
            <th>{{__('admin.system.actions')}}</th>
        </tr>
        </thead>
    </table>
@endsection

@section('additionContent')
@endsection

@section('modals')
@endsection

@section('scripts')
    <script src="/adm/js/stories.js"></script>
@endsection
