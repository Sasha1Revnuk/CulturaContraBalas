@extends('layouts.web.index')

@php
    $locale = app()->getLocale();
@endphp
@section('content')
    @if(auth()->check())
        @if(auth()->user()->hasDirectPermission(\App\Enumerators\Admin\RolesEnumerator::PERMISSION_LOGIN_TO_ADMIN))
            <a href="{{route('admin.main.index')}}">Admin</a>
        @endif
        <a href="/logout">Logout</a>

    @else
        <a href="{{route('cabinet.main')}}">Login</a>

    @endif
@endsection
