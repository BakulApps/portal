@extends('layout.master')
@section('content')
    <div class="contact-area pt-130 pb-130">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="contact-map mr-70">
                        <div id="map"></div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-form">
                        <div class="contact-title mb-45">
                            <h2>Tetap <span>Terhubung</span></h2>
                            <p>Adakah hal-hal yang ingin Anda tanyakan perihal Yayasan Darul Hikmah Menganti</p>
                        </div>
                        <form id="contact-form" method="post">
                            @csrf
                            <input name="name" placeholder="Nama Lengkap*" type="text">
                            <input name="email" placeholder="Email*" type="email">
                            <input name="subject" placeholder="Subjek*" type="text">
                            <textarea name="message" placeholder="Pesan"></textarea>
                            <button class="submit btn-style" type="submit">Kirim Pesan</button>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-info-area bg-img pt-180 pb-140 default-overlay" style="background-image:url({{asset('assets/img/bg/contact-info.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-contact-info mb-30 text-center">
                        <div class="contact-info-icon">
                            <span><i class="fa fa-location-arrow"></i></span>
                        </div>
                        <p>Jl. Bugel - Jepara KM 7 <br>Menganti Kedung Jepara.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-contact-info mb-30 text-center">
                        <div class="contact-info-icon">
                            <span><i class="fa fa-whatsapp"></i></span>
                        </div>
                        <div class="contact-info-phn">
                            <div class="info-phn-number">
                                <p><a target="_blank" href="https://api.whatsapp.com/send?phone=6285217232610">+62 852 1723 2610</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-contact-info mb-30 text-center">
                        <div class="contact-info-icon">
                            <span><i class="fa fa-envelope"></i></span>
                        </div>
                        <a href="mailto:info@darul-hikmah.sch.id" target="_blank">info@darul-hikmah.sch.id</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-logo-area pt-130 pb-130">
        <div class="container">
            <div class="brand-logo-active owl-carousel">
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/img/brand-logo/1.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/img/brand-logo/2.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/img/brand-logo/3.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/img/brand-logo/4.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/img/brand-logo/5.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/img/brand-logo/6.png')}}" alt=""></a></div>
                <div class="single-brand-logo"><a href="#"><img src="{{asset('assets/img/brand-logo/2.png')}}" alt=""></a></div>
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
                center: new google.maps.LatLng(-6.6606167, 110.6646063),
                styles:
                    [
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#e9e9e9"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 29
                                },
                                {
                                    "weight": 0.2
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 18
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#dedede"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "saturation": 36
                                },
                                {
                                    "color": "#333333"
                                },
                                {
                                    "lightness": 40
                                }
                            ]
                        },
                        {
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f2f2f2"
                                },
                                {
                                    "lightness": 19
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 17
                                },
                                {
                                    "weight": 1.2
                                }
                            ]
                        }
                    ]
            };
            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.709896, -73.995481),
                map: map,
                icon: 'assets/img/icon/2.png',
                animation:google.maps.Animation.BOUNCE,
                title: 'Snazzy!'
            });
        }
        google.maps.event.addDomListener(window, 'load', init);
    </script>
@endsection
