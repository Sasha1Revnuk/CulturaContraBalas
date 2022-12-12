<div class="form-group">
    @if(isset($label))
        <label class="form-label" for="{{$id ?? $field}}">{{$label}}</label>
    @endif
    <textarea @if($id) id="{{$id}}" @endif
        {{
            $attributes
            ->class([
                'form-control',
                'is-invalid' => $errors->has($field),
            ])
            ->merge(array_merge([
                'required' => $required,
                'disabled' => $disabled,
                'name' => $field,
            ], $customAttributes))
        }}>{{old($field,  $value ?? ($model?->$field ?? ''))}}</textarea>
    <span class="text-muted">
        {{$hint}}
    </span>
    <div class="invalid-feedback">
        @error($field)
        {{$message}}
        @enderror
    </div>
</div>
