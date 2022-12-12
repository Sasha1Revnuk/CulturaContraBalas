<li>
    <a href="{{route($route, $params)}}"
        {{
         $attributes->class([
         'waves-effect',
         'active' => (request()->route()->getName() == $route && count(array_diff($params, request()->route()->parameters())) == 0)
         ])
         }}>
        <i class="{{$menuIcon}}"></i>
        <span>{{$title}}</span>
    </a>
</li>
