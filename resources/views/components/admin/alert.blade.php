<div {{
        $attributes->class([
            'alert',
            'alert-success' => $type === 'success',
            'alert-danger' => $type === 'danger',
            'alert-warning' => $type === 'warning',
            'alert-info' => $type === 'info',
            'alert-dismissible fade show' => $withClose
        ])->merge(array_merge([
            'role' => 'alert'
        ], $customAttributes))
    }}>
    {!! $getDefaultMdi() !!}
    {{$slot}}
    @if($withClose)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
