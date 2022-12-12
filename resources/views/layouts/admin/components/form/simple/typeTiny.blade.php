{{--
    id
    field
    label
    model
    required
    placeholder
    disabled
    value
    hint
--}}
<div class="form-group">
<label class="form-label {{isset($required)  && $required == true ? 'requiredInput' : ''}}">{{$label}}</label>
<textarea name="{{$field}}" id="{{isset($id) ?  $id : $field}}" @if('placeholder') placeholder="{{$placeholder ?? ''}}" @endif
          class="tinyMCE form-control @error($field) is-invalid @enderror">{{old($field,  isset($value) ? $value : ($model ? $model->$field : ''))}}</textarea>
    <span class="text-muted">
        {{isset($hint) ? $hint : ''}}
    </span>
    @error($field)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
