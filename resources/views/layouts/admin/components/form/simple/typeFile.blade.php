{{--
    id
    field
    label
    disabled
    required
    image - just a string
    withAlt
    altValue - just a string
--}}
<div class="form-group" style="display: flex;  justify-content: space-between; align-items: center">
    <element>
        <label class="form-label">{{$label}}</label>
        <div class="custom-file">
            <input type="file" class="form-control @error($field) is-invalid @enderror " id="{{isset($id) ?  $id : $field}}" {{isset($required)  && $required == true ? 'required' : ''}} name="{{$field}}">
            @error($field)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </element>
    @if(isset($withAlt))
    <element>
        <label class="form-label">Alt</label>
        <input type="text" class="form-control" name="{{$field}}_alt" value="{{$altValue}}">
    </element>
    @endif
    @if(isset($image))
    <element>
            <button type="button" style="margin-top: 24px" class="btn btn-sm btn-primary waves-effect waves-themed" data-bs-toggle="modal" data-bs-target="#{{isset($id) ?  $id : $field}}-modal">Переглянути</button>
            <div class="modal fade" id="{{isset($id) ?  $id : $field}}-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img class="img-fluid" src="{{asset($image)}}">
                        </div>
                    </div>
                </div>
            </div>

    </element>
    @endif

</div>

