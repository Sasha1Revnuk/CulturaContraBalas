@extends('layouts.web.index')
@section('content')
    <div class="main-container color-blk"><!--  Main-container section -->
        <div class="container event-detail "><!-- event-detail start -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">{{$eventTranslation->title}}</h1>
                    <div class="pic"><img src="{{$event->image_url}}" class="img-responsive"
                                          style="opacity: 1!important; margin: 0 auto" alt=""></div>
                    <div class="tinyWrap">
                        {!! $eventTranslation->description !!}
                    </div>
                    <a href="{{route('events.index')}}" class="btn btn-yellow">{{__('site.back_to_events')}}</a></div>
            </div>

        </div>
    </div>
    <!-- event-detail close-->
    </div>
@endsection
