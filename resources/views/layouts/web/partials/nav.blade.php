<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span
                class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
        <span class="icon-bar"></span></button>
    <a class="navbar-brand" href="{{route('main.index')}}"><img style="max-height: 45px"
                                                                src="{{asset('assets/images/logo-site.png')}}"
                                                                alt="logo"></a></div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        {{--        <li><a @if(request()->route()->getName() === 'about.index') style="color:#ffd133"--}}
        {{--               @endif href="{{route('about.index')}}">{{__('site.about')}}</a></li>--}}
        <li><a @if(request()->route()->getName() === 'events.index') style="color:#ffd133"
               @endif href="{{route('events.index')}}">{{__('site.events')}}</a></li>
        <li><a @if(request()->route()->getName() === 'donate.index') style="color:#ffd133"
               @endif href="{{route('donate.index')}}">{{__('site.donate')}}</a></li>
        <li class="dropdown"><a href="" class="dropdown-toggle"
                                data-toggle="dropdown">{{\App\Services\LanguageService::getLangualgeTitle()[app()->getLocale()]}}
                <b
                        class="caret"></b></a>
            <ul class="dropdown-menu">
                @foreach(\App\Services\LanguageService::LANGUAGES as $language)
                    @if(app()->getLocale() !== $language)
                        <li>
                            <a href="{{route('setlocale', ['lang' => $language])}}">{{\App\Services\LanguageService::getLangualgeTitle()[$language]}} </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->