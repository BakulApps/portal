@extends('layout.master')
@section('content')
    <div class="event-area pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-all-wrap mr-40">
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="single-blog mb-30">
                                    <div class="blog-img">
                                        <a href="{{route('article.detail', $post->post_id)}}">
                                            <img src="{{asset($post->post_image == null ? 'assets/img/blog/blog-1.jpg' : $post->post_image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-content-wrap">
                                        <span>{{\App\Models\Category::name($post->post_category)}}</span>
                                        <div class="blog-content">
                                            <h4><a href="{{route('article.detail', $post->post_id)}}">{{$post->post_title}}</a></h4>
                                            <p>{{substr($post->post_content, 0, 50)}}</p>
                                            <div class="blog-meta">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-user"></i>{{$post->user->user_name}}</a></li>
                                                    <li><a href="#"><i class="fa fa-comments-o"></i> {{$post->comment->count()}}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="blog-date">
                                            <a href="#"><i class="fa fa-calendar-o"></i> {{\Carbon\Carbon::parse($post->created_at)->formatLocalized('%I %b %Y')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if($posts->lastPage() > 1)
                        <div class="pro-pagination-style text-center mt-25">
                            <ul>
                                <li><a class="prev" href="{{$posts->url(1)}}"><i class="fa fa-angle-double-left"></i></a></li>
                                @for($i=1;$i<$posts->lastPage();$i++)
                                <li><a class="{{$posts->currentPage() == $i ? 'active' : null}}" href="{{$posts->url($i)}}">{{$i}}</a></li>
                                @endfor
                                <li><a class="next" href="{{$posts->currentPage() + 1}}"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                @include('layout.sidebar')
            </div>
        </div>
    </div>
@endsection
