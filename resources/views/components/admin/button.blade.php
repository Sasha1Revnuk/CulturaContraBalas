<button
    {{
        $attributes->class([
            'btn',
            'waves-effect',
            'waves-light',
        ])->merge(array_merge([
            'type' => $type
        ], $customAttributes))
    }}
>{{$slot}}</button>
