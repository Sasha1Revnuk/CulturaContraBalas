<title>
    {{isset($meta['title']) ? $meta['title'] . ' - ' . env('APP_NAME') : env('APP_NAME')}}
</title>
<meta name="description" content="{{isset($meta['description']) ? $meta['description']  : env('APP_NAME')}}">
<meta name="keywords" content="{{isset($meta['keywords']) ? $meta['keywords']  : env('APP_NAME')}}">
{{--<meta name="robots" content="{{isset($meta['robots']) ? $meta['robots'] : env('APP_NAME')}}">--}}
<meta name="robots" content="index, follow">
<meta name="csrf-token" content="{{ csrf_token() }}">