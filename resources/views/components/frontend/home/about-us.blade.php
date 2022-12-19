<div class="about-us pt-130 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="about-content">
                    <div class="section-title section-title-green mb-30">
                        <h2>{!! $page->home_widget_about_title !!}</h2>
                        <p style="text-align: justify">
                            {{$page->home_widget_about_content_first}}
                        </p>
                    </div>
                    <p style="text-align: justify">
                        {{$page->home_widget_about_content_second}}
                    </p>
                    <div class="about-btn mt-45">
                        <a class="default-btn" href="{{$page->home_widget_about_content_link}}">{{$page->home_widget_about_content_link_text}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="about-img default-overlay">
                    <img src="{{asset($page->home_widget_about_content_image)}}" alt="">
                    <a class="video-btn video-popup" href="{{$page->home_widget_about_content_video}}">
                        <img class="animated" src="{{asset('assets/frontend/img/icon/video.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
