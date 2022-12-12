<div {{$attributes->class('card')}}>
    @if($withHeader)
        @if(isset($customHeader))
            {{$customHeader}}
        @else
            <h3 {{$header->attributes->class([
                'border-bottom',
                'card-title',
                'card-header',
                'bg-transparent',
            ])}}>{{$header}}</h3>
        @endif
    @endif
    <div {{$body->attributes->class('card-body')}}>
        {{$body}}
    </div>
    @if($withFooter)
        @if(isset($customFooter))
            {{$customFooter}}
        @else
            <div {{$footer->attributes->class([
                'card-footer',
                'bg-transparent'
            ])}}>
                {{$footer}}
            </div>
        @endif
    @endif

</div>
