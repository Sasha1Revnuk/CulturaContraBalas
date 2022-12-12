<div class="btn-group">
    @if(isset($item['href']))
        <a href="{{$item['href']}}"
           class="btn {{$item['class'] ?? ''}} {{(isset($item['class']) && str_contains($item['class'], 'btn-') == true ) ? '' : 'btn-primary'}}"
        @if(isset($item['attributes']))
            @foreach($item['attributes'] as $attribute => $value)
                {{$attribute}}="{{$value}}"
            @endforeach
        @endif>{{$item['title']}}</a>
    @else

        <x-admin.button
            type="button"
            class="{{$item['class'] ?? ''}} {{(isset($item['class']) && str_contains($item['class'], 'btn-') == true ) ? '' : 'btn-primary'}}"
            :customAttributes="$item['attributes'] ?? []">{{$item['title']}}
        </x-admin.button>
    @endif
</div>
