<div class="btn-group">
    <x-admin.button
        type="button"
        class="btn-primary dropdown-toggle"
        :customAttributes="[
            'data-bs-toggle' => 'dropdown',
            'aria-expanded' => false
        ]">{{__('admin.system.select_action')}}<i class="mdi mdi-chevron-down"></i>
    </x-admin.button>
    <div class="dropdown-menu" style="">
        @foreach($items as $item)
            <a class="dropdown-item {{$item['class'] ?? ''}}" href="{{$item['href'] ?? 'javascript:void(0)'}}"
            @if(isset($item['attributes']))
                @foreach($item['attributes'] as $attribute => $value)
                    {{$attribute}}="{{$value}}"
                @endforeach
            @endif
            >{{$item['title']}}</a>
        @endforeach

    </div>
</div>
