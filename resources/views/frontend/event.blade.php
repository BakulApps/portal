@extends('frontend.master')
@section('content')
    <div class="event-area pt-130 pb-130">
        <div class="container">
            <div class="row">
                @foreach($events as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-event mb-55 event-gray-bg">
                            <div class="event-img">
                                <a href="{{route('event.detail', $event->event_id)}}">
                                    <img
                                        src="{{asset($event->event_image == null ? 'assets/fronted/img/event/event.jpg' : $event->event_image)}}"
                                        alt="">
                                </a>
                                <div class="event-date-wrap">
                                    <span class="event-date">{{$event->date_start('d')}}</span>
                                    <span>{{$event->date_start('m')}}</span>
                                </div>
                            </div>
                            <div class="event-content">
                                <h3><a href="{{route('event.detail', $event->event_id)}}">{{$event->event_title}}</a>
                                </h3>
                                {!! substr($event->event_content, 0, 150) !!}
                                <div class="event-meta-wrap">
                                    <div class="event-meta">
                                        <i class="fa fa-location-arrow"></i>
                                        <span>{{$event->event_place}}</span>
                                    </div>
                                    <div class="event-meta">
                                        <i class="fa fa-clock-o"></i>
                                        <span>{{$event->event_time}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($events->lastPage() > 1)
                <div class="pro-pagination-style text-center mt-25">
                    <ul>
                        <li><a class="prev" href="{{$events->url(1)}}"><i class="fa fa-angle-double-left"></i></a></li>
                        @for($i=1;$i<$events->lastPage();$i++)
                            <li><a class="{{$events->currentPage() == $i ? 'active' : null}}"
                                   href="{{$events->url($i)}}">{{$i}}</a></li>
                        @endfor
                        <li><a class="next" href="{{$events->currentPage() + 1}}"><i
                                    class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="brand-logo-area pb-130">
        <div class="container">
            <div class="brand-logo-active owl-carousel">
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/1.png')}}"
                                                                alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/2.png')}}"
                                                                alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/3.png')}}"
                                                                alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/4.png')}}"
                                                                alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/5.png')}}"
                                                                alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/6.png')}}"
                                                                alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/2.png')}}"
                                                                alt=""></a></div>
            </div>
        </div>
    </div>
@endsection
