<li class="{{ in_array(request()->route()->getName(), $items) ? 'mm-active' : '' }}">
    <a href="javascript: void(0);"
       class="has-arrow waves-effect" {{ in_array(request()->route()->getName(), $items) ? 'aria-expanded="true"' : 'aria-expanded="false"' }}>
        <i class="{{$menuIcon}}"></i>
        <span key="t-multi-level">{{$title}}</span>
    </a>
    <ul class="sub-menu {{ in_array(request()->route()->getName(), $items) ? 'mm-collapse mm-show' : '' }}" {{ in_array(request()->route()->getName(), $items) ? 'aria-expanded="true"' : 'aria-expanded="false"' }}>
        @foreach($items as $item)
            @if(is_array($item['href']))
                <li class="{{ in_array(request()->route()->getName(), $item['href']) ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="has-arrow">{{$item['title']}}</a>
                    <ul class="sub-menu {{ in_array(request()->route()->getName(), $item['href']) ? 'mm-collapse mm-show' : '' }}" {{ in_array(request()->route()->getName(), $item['href']) ? 'aria-expanded="true"' : 'aria-expanded="false"' }}>
                        @foreach( $item['href'] as $subItem)
                            @php
                                $params = isset($subItem['params']) ? $subItem['params'] : [];
                            //dd(array_diff((isset($item['params']) ? $item['params'] : []), request()->route()->parameters()));
                            @endphp
                            <li class="{{request()->route()->getName() == $subItem['href']  && count(array_diff((isset($subItem['params']) ? $subItem['params'] : []), request()->route()->parameters())) == 0 ? 'mm-active' : ''}}">
                                <a href="{{route($subItem['href'], $params)}}" {{request()->route()->getName() == $subItem['href'] ? 'aria-expanded="true"' : 'aria-expanded="false"'}}>{{$subItem['title']}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                @php
                    $params = isset($item['params']) ? $item['params'] : [];
                @endphp
                <li class="{{request()->route()->getName() == $item['href'] && count(array_diff((isset($item['params']) ? $item['params'] : []), request()->route()->parameters())) == 0 ? 'mm-active' : ''}}">
                    <a href="{{route($item['href'], $params)}}" {{request()->route()->getName() == $item['href'] ? 'aria-expanded="true"' : 'aria-expanded="false"'}}>{{$item['title']}}</a>
                </li>
            @endif

        @endforeach
    </ul>
</li>
