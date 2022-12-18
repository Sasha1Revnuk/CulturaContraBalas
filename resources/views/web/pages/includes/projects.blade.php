<div class="row">
    @foreach($projects as $project)
        <div class=" col-md-4 list">
            <div class="pic"><a style=" position: relative;
    padding-top: 56%; display: flex" target="_blank" href="{{route('events.single', ['event' => $project->slug])}}"><img
                            style="position: absolute;
    top: 0;
    left: 0;
    object-fit: cover;
    object-position: center;
    width: 100%;
    height: 100%;"
                            src="{{$project->image_url}}" class="img-responsive"></a></div>
            <div class="event-ct">
                <h2>
                    <a target="_blank" class="btn btn-yellow"
                       href="{{route('events.single', ['event' => $project->slug])}}">{{$project->translations->first()->title}}</a>
                </h2>
                <p>{{$project->translations->first()->short_description}}</p>
            </div>
        </div>
    @endforeach
</div>