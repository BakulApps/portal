<div class="slider-area">
    <div class="slider-active owl-carousel">
        @foreach($sliders as $slider)
            @php($button = json_decode($slider->slider_button, true))
            <div class="single-slider slider-height-1 bg-img" style="background-image:url({{asset($slider->slider_bg_image)}});">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="top-button">
                                <a class="button" target="_blank" href="https://paudra.darul-hikmah.sch.id">PAUD & RA DARUL HIKMAH</a>
                                <a class="button" target="_blank" href="https://mi.darul-hikmah.sch.id">MI PTQ DARUL HIKMAH</a>
                                <a class="button" target="_blank" href="https://mts.darul-hikmah.sch.id">MTs. DARUL HIKMAH</a>
                                <a class="button" target="_blank" href="https://ma.darul-hikmah.sch.id">MA DARUL HIKMAH</a>
                                <a class="button" target="_blank" href="https://ponpes.darul-hikmah.sch.id">PONPES DARUL HIKMAH</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7 col-12 col-sm-12">
                            <div class="slider-content slider-animated-1 pt-230">
                                <h1 class="animated">{{$slider->slider_title}}</h1>
                                <p class="animated">{{$slider->slider_content}}</p>
                                <div class="slider-btn">
                                    @for($i=0;$i<count($button);$i++)
                                        <a class="animated default-btn btn-green-color" href="{{$button[$i]['url']}}">{{$button[$i]['text']}}</a>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-single-img slider-animated-1">
                        <img class="animated" src="{{asset($slider->slider_image)}}" alt="">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
