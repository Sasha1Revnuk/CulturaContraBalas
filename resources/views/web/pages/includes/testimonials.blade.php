<div id="owl-demo-testimonial" class="testimonials-ct">
    @foreach($stories as $story)
        <div class="item">
            <p><strong>“</strong>{{$story->translations->first()->text}}<strong>”</strong>
            </p>
            <span class="name">{{$story->translations->first()->name}}</span>
        </div>
    @endforeach


</div>
