@extends('layouts.web.index')
@section('content')
    <div class="main-container color-blk"><!-- Main-container section -->
        <!--  Team section -->
        <div class="container blog">
            <div class="row title">
                <div class="col-md-offset-2 col-md-8">
                    <h1>{{__('site.events')}}</h1>

                </div>
            </div>
            <hr>
            @foreach($events as $event)
                <div class="row blk">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="row">
                            <div class=" col-md-3">
                                <div class="pic"><img src="{{$event->image_url}}" class="img-responsive" alt=""></div>
                            </div>
                            <div class=" col-md-9">
                                <div class="event-ct">
                                    <h2>
                                        <a href="{{route('events.single', ['event' => $event->slug])}}">{{$event->translations->first()->title}}</a>
                                    </h2>
                                    <p>{{$event->translations->first()->short_description}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
            <div class="text-center">
                {!! $events->links('vendor.pagination.custom_default') !!}
            </div>
        </div>
    </div>
@endsection
