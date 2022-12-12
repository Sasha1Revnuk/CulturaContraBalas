<ol class="breadcrumb m-0">
    @foreach($breadcrumbs as $breadcrumbsTitle => $breadcrumbsLink)
        @if($breadcrumbsLink)
            <li class="breadcrumb-item"><a href="{{$breadcrumbsLink}}">{{$breadcrumbsTitle}}</a></li>
        @else
            <li class="breadcrumb-item active">{{$breadcrumbsTitle}}</li>
        @endif
    @endforeach
</ol>
