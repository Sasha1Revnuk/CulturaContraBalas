<div
    {{
        $attributes
        ->class([
            'modal',
            'fade',
        ])
        ->merge(array_merge([
              'id' => $id,
              'tabindex' => '-1',
              'aria-labelledby' => $id.'Title',
              'aria-hidden' => 'true',
              'style' => 'display: none;',
        ], $customAttributes))
    }}>
    <div class="modal-dialog {{$modalDialogClass}}">
        <div class="modal-content">
            @if($withHeader)
                <div class="modal-header">
                    @if(isset($customHeader))
                        {{$customHeader}}
                    @else
                        <h5 {{$header->attributes->class([
                            'modal-title',
                        ])}} {{$header->attributes->merge([
                            'id' =>  $id.'Title'
                        ])}}>{{$header}}</h5>
                        <x-admin.button
                            type="button"
                            class="btn-close"
                            :customAttributes="[
                                'data-bs-dismiss' => 'modal',
                                'aria-label' => __('admin.system.close'),
                            ]">
                        </x-admin.button>
                    @endif
                </div>
            @endif
            <div {{$body->attributes->class('modal-body')}}>
                {{$body}}
            </div>
            @if($withFooter)
                <div class="modal-footer">
                    @if(isset($customFooter))
                        {{$customFooter}}
                    @else
                        {{$footer}}
                        <x-admin.button
                            type="button"
                            class="btn btn-light"
                            :customAttributes="[
                                'data-bs-dismiss' => 'modal',
                            ]">{{__('admin.system.close')}}
                        </x-admin.button>
                    @endif
                </div>
            @endif
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
