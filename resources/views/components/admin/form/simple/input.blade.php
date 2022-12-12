<div class="form-group mb-3">
    @if(isset($label))
        <label class="form-label " for="{{$id ?? $field}}">{!! $label !!}</label>
    @endif
    <input @if($id) id="{{$id}}" @endif
        {{
            $attributes
            ->class([
                  'form-control',
                  'is-invalid' => $errors->has($field),
            ])
            ->merge(array_merge([
                  'required' => $required,
                  'disabled' => $disabled,
                  'type' => $type,
                  'name' => $field,
                  'value' => old($field,  $value ?? ($model?->$field ?? '')),
            ], $customAttributes))
        }}

    >
    <span class="text-muted">
        {{$hint}}
    </span>
    <div class="invalid-feedback">
        @error($field)
        {{$message}}
        @enderror
    </div>

</div>
