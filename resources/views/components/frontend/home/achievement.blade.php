<div class="achievement-area pt-130 pb-115">
    <div class="container">
        <div class="section-title mb-75">
            <h2>{!! $page->home_widget_achievement_title !!}</h2>
            <p>{{$page->home_widget_achievement_content_first}}</p>
        </div>
        <div class="row">
            @for($i=0;$i<count($achievement);$i++)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count mb-30 count-one">
                        <div class="count-img">
                            <img src="{{asset($achievement[$i]->image)}}" alt="">
                        </div>
                        <div class="count-content">
                            <h2 class="count">{{$achievement[$i]->count}}</h2>
                            <span>{{$achievement[$i]->title}}</span>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="testimonial-slider-wrap mt-45">
            <div class="testimonial-text-slider">
                <div class="testi-content-wrap">
                    <div class="testi-big-img">
                        <img alt="" src="{{asset('assets/fronted/img/testimonial/testi-b1.jpg')}}">
                    </div>
                    <div class="row no-gutters">
                        <div class="ml-auto col-lg-6 col-md-12">
                            <div class="testi-content bg-img default-overlay"
                                 style="background-image:url({{asset('assets/fronted/img/bg/testi.png')}});">
                                <div class="quote-style quote-left">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                                <p>
                                    Dengan adanya budi pekerti, tiap-tiap manusia berdiri sebagai manusia merdeka
                                    (berpribadi), yang dapat memerintah atau menguasai diri sendiri. Inilah manusia
                                    beradab dan itulah maksud dan tujuan pendidikan dalam garis besarnya.
                                </p>
                                <div class="testi-info">
                                    <h5>K.H. Sulaiman Tamam</h5>
                                    <span>Pendiri Yayasan Darul Hikmah</span>
                                </div>
                                <div class="quote-style quote-right">
                                    <i class="fa fa-quote-right"></i>
                                </div>
                                <div class="testi-arrow">
                                    <img alt="" src="{{asset('assets/fronted/img/icon/testi-icon.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi-content-wrap">
                    <div class="testi-big-img">
                        <img alt="" src="{{asset('assets/fronted/img/testimonial/testi-b2.jpg')}}">
                    </div>
                    <div class="row no-gutters">
                        <div class="ml-auto col-lg-6 col-md-12">
                            <div class="testi-content bg-img default-overlay"
                                 style="background-image:url({{asset('assets/fronted/img/bg/testi.png')}});">
                                <div class="quote-style quote-left">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                                <p>
                                    Pendidikan dan pengajaran di dalam Republik Indonesia harus berdasarkan
                                    kebudayaan
                                    dan kemasyarakatan bangsa Indonesia, menuju ke arah kebahagiaan batin serta
                                    keselamatan hidup lahir.
                                </p>
                                <div class="testi-info">
                                    <h5>K.H. Tas'an Tamam</h5>
                                    <span>Ketua Yayasan Darul Hikmah</span>
                                </div>
                                <div class="quote-style quote-right">
                                    <i class="fa fa-quote-right"></i>
                                </div>
                                <div class="testi-arrow">
                                    <img alt="" src="{{asset('assets/fronted/img/icon/testi-icon.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi-content-wrap">
                    <div class="testi-big-img">
                        <img alt="" src="{{asset('assets/fronted/img/testimonial/testi-b3.jpg')}}">
                    </div>
                    <div class="row no-gutters">
                        <div class="ml-auto col-lg-6 col-md-12">
                            <div class="testi-content bg-img default-overlay"
                                 style="background-image:url({{asset('assets/fronted/img/bg/testi.png')}});">
                                <div class="quote-style quote-left">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                                <p>
                                    Orang yang mempunyai kecerdasan budi pekerti itu senantiasa memikir-mikirkan dan
                                    merasa-rasakan serta selalu memakai ukuran, timbangan dan dasar-dasar yang pasti
                                    dan
                                    tetap.
                                </p>
                                <div class="testi-info">
                                    <h5>K.H. Mahfud Shidiq</h5>
                                    <span>Ketua Yayasan Darul Hikmah</span>
                                </div>
                                <div class="quote-style quote-right">
                                    <i class="fa fa-quote-right"></i>
                                </div>
                                <div class="testi-arrow">
                                    <img alt="" src="{{asset('assets/fronted/img/icon/testi-icon.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-image-slider">
                <div class="sin-testi-image">
                    <img src="{{asset('assets/fronted/img/testimonial/testi-b1.jpg')}}" alt="">
                </div>
                <div class="sin-testi-image">
                    <img src="{{asset('assets/fronted/img/testimonial/testi-b2.jpg')}}" alt="">
                </div>
                <div class="sin-testi-image">
                    <img src="{{asset('assets/fronted/img/testimonial/testi-b3.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
