<div class="row">
    @foreach($projects as $project)
        <div class=" col-md-4 list">
            <div class="pic"><a target="_blank" href="{{route('events.single', ['event' => $project->slug])}}"><img
                            src="{{$project->image_url}}" class="img-responsive"></a></div>
            <div class="event-ct">
                <h2>
                    <a target="_blank"
                       href="{{route('events.single', ['event' => $project->slug])}}">{{$project->translations->first()->title}}</a>
                </h2>
                <p>{{$project->translations->first()->short_description}}</p>
            </div>
        </div>
    @endforeach
</div>