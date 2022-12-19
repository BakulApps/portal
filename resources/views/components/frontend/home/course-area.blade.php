<div class="course-area bg-img pt-130 pb-10"
     style="background-image:url({{asset('assets/fronted/img/bg/bg-1.jpg')}});">
    <div class="container">
        <div class="section-title mb-75">
            <h2>{!! $page->home_widget_course_title !!}</h2>
            <p>{{$page->home_widget_course_content_first}}</p>
        </div>
        <div class="course-slider-active nav-style-1 owl-carousel">
            @for($i=0;$i<count($carousel);$i++)
                <div class="single-course">
                    <div class="course-img">
                        <a href="{{$carousel[$i]->link}}"><img class="animated" src="{{asset($carousel[$i]->image)}}" alt=""></a>
                        <span>{{$carousel[$i]->subtitle}}</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="{{$carousel[$i]->link}}">{{$carousel[$i]->title}}</a></h4>
                        <p>{{$carousel[$i]->content}}</p>
                    </div>
                    <div class="course-position-content">
                        <div class="course-btn">
                            <a class="default-btn" href="{{$carousel[$i]->link}}">{{$carousel[$i]->text}}</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
