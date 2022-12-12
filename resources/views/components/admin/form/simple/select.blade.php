<div class="form-group mb-3">
    @if(isset($label))
        <label class="form-label " for="{{$id ?? $field}}">{{$label}}</label>
    @endif
    <select @if($id) id="{{$id}}" @endif
        {{
            $attributes
            ->class([
                  'form-select',
                  'is-invalid' => $errors->has($field),
            ])
            ->merge(array_merge([
                  'required' => $required,
                  'disabled' => $disabled,
                  'name' => $field,
            ], $customAttributes))
        }}

    >{{$slot}}</select>
    <span class="text-muted">
        {{$hint}}
    </span>
    <div class="invalid-feedback">
        @error($field)
        {{$message}}
        @enderror
    </div>

</div>
