<div class="form-check mb-3 {{$formCheckClass}}" {{$attributes->merge($formCheckAttributes)}}>
    <input @if($id) id="{{$id}}" @endif @checked($checked)
        {{
            $attributes
            ->class([
                'form-check-input',
                'is-invalid' => ($withoutError == false && $errors->has($field))
            ])
            ->merge(array_merge([
                'disabled' => $disabled,
                'type' => $type,
                'value' => $value,
                'name' => $field,
                'required' => $required
            ], $customAttributes))
        }}
    >
    @if(isset($label))
        <label class="form-check-label"
               for="{{$id ?? $field}}">
            {{$label}}
        </label>
    @endif
</div>
