@extends('fronted.layout.master')
@section('content')
    <div class="event-details-area pt-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="event-left-wrap mr-40">
                        <div class="event-description">
                            <div class="description-date-social mb-45">
                                <div class="description-date-time">
                                    <div class="description-date">
                                        <span class="event-date">{{\Carbon\Carbon::parse($event->event_date)->formatLocalized('%I')}}</span>
                                        <span>{{\Carbon\Carbon::parse($event->event_date)->formatLocalized('%b')}}</span>
                                    </div>
                                    <div class="description-meta-wrap">
                                        <div class="description-meta">
                                            <i class="fa fa-location-arrow"></i>
                                            <span>{{$event->event_place}}</span>
                                        </div>
                                        <div class="description-meta">
                                            <i class="fa fa-clock-o"></i>
                                            <span>{{$event->event_time}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="description-social-wrap">
                                    <div class="description-social">
                                        <ul>
                                            <li><a class="whatsapp" href="#"><i class="fa fa-whatsapp"></i></a></li>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="description-btn">
                                        <a href="#"><i class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                            <img src="{{asset($event->event_image == null ? 'assets/fronted/img/event/event-details.jpg' : $event->event_image)}}" alt="">
                            <h3>{{$event->event_title}}</h3>
                            {!! $event->event_content !!}
                            @if($event->event_galery != null)
                                @php $galery = json_decode($event->event_galery) @endphp
                            <div class="event-gallery text-center mt-40">
                                <div class="event-gallery-active nav-style-3 owl-carousel">
                                    @for($i=0;$i<count($galery);$i++)
                                    <img src="{{asset($galery[$i])}}" alt="">
                                    @endfor
                                </div>
                                <h4>Galeri Kegiatan</h4>
                            </div>
                            @endif
                            <div class="location-area mt-80">
                                <div id="location"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('fronted.layout.sidebar')
            </div>
        </div>
    </div>
    <div class="brand-logo-area pt-130 pb-130">
        <div class="container">
            <div class="brand-logo-active owl-carousel">
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/1.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/2.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/3.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/4.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/5.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/6.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/fronted/img/brand-logo/2.png')}}" alt=""></a></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzcEM8z2_imGO8TMRmJEpDEahvZ7KYY_U"></script>
@endsection
@section('script')
    <script>
    function init() {
        var mapOptions = {
            zoom: 11,
            scrollwheel: false,
            center: new google.maps.LatLng(40.709896, -73.995481),
            styles:
                [
                    {
                        "featureType": "all",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "weight": "2.00"
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#9c9c9c"
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape.man_made",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#eeeeee"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#7b7b7b"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#46bcec"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#c8d7d4"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#070707"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    }
                ]
        };
        var mapElement = document.getElementById('location');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.709896, -73.995481),
            map: map,
            icon: '../../assets/fronted/img/icon/2.png',
            animation:google.maps.Animation.BOUNCE,
            title: 'Snazzy!'
        });
    }
    google.maps.event.addDomListener(window, 'load', init);
</script>
@endsection
