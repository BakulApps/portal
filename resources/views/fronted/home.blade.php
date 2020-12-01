@extends('fronted.layout.master')
@section('content')
    @include('fronted.layout.slider')
    <div class="choose-us section-padding-1">
        <div class="container-fluid">
            <div class="row no-gutters choose-negative-mrg">
                <div class="col-lg-3 col-md-6">
                    <div class="single-choose-us choose-bg-light-blue">
                        <div class="choose-img">
                            <img class="animated" src="{{asset('assets/fronted/img/icon/brain.png')}}" alt="">
                        </div>
                        <div class="choose-content">
                            <h3>Integritas</h3>
                            <p>Keselarasan Antara Hati, Pikiran, Perkataan Dan Perbuatan Yang Baik Dan Benar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-choose-us choose-bg-yellow">
                        <div class="choose-img">
                            <img class="animated" src="{{asset('assets/fronted/img/icon/education.png')}}" alt="">
                        </div>
                        <div class="choose-content">
                            <h3>Profesionalitas</h3>
                            <p>Bekerja Secara Disiplin, Kompeten Dan Tepat Waktu Guna Memberikan Hasil Terbaik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-choose-us choose-bg-blue">
                        <div class="choose-img">
                            <img class="animated" src="{{asset('assets/fronted/img/icon/flasks.png')}}" alt="">
                        </div>
                        <div class="choose-content">
                            <h3>Inovasi</h3>
                            <p>Menyempurnakan Yang Sudah Ada Dan Mengkreasi Hal Baru Guna Memberikan Yang Lebih Baik. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-choose-us choose-bg-green">
                        <div class="choose-img">
                            <img class="animated" src="{{asset('assets/fronted/img/icon/responsibility.png')}}" alt="">
                        </div>
                        <div class="choose-content">
                            <h3>Tanggung Jawab</h3>
                            <p>Bekerja Secara Tuntas Dan Konsekuen Sesuai Pedoman Yang Telah Disepakati Bersama. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about-content">
                        <div class="section-title section-title-green mb-30">
                            <h2>Pendiri <span>Kami</span></h2>
                            <p style="text-align: justify">
                                KH. Sulaiman Tamam lahir pada tahun 1916 M di desa Menganti Kedung Jepara. Beliau merupakan
                                putra pertama dari 3 bersaudara yakni KH. Abdurrahman Jondang dan Kyai Wardi Bugel, dari
                                pasangan KH. Idris dan Nyai Salamah.
                            </p>
                        </div>
                        <p style="text-align: justify">
                            KH. Sulaiman Tamam merupakan salah satu tokoh masyarakat desa Menganti yang sangat terbuka
                            pemikirannya pada ide-ide pembaharuan demi kesejahteraan masyarakat. Beliau bersama tokoh
                            masyarakat lain bergotong royong untuk memberantas kemiskinan dan kebodohan masa itu melalui
                            jalur pendidikan yang menekankan keseimbangan ilmu keduniaan dan ilmu akhirat sekaligus.
                        </p>
                        <div class="about-btn mt-45">
                            <a class="default-btn" href="{{route('article.detail', 1)}}">SELENGKAPNYA</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about-img default-overlay">
                        <img src="{{asset('assets/fronted/img/banner/banner-1.png')}}" alt="">
                        <a class="video-btn video-popup" href="https://www.youtube.com/watch?v=UUsyhDhEwtA">
                            <img class="animated" src="{{asset('assets/fronted/img/icon/video.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="course-area bg-img pt-130 pb-10" style="background-image:url({{asset('assets/fronted/img/bg/bg-1.jpg')}});">
        <div class="container">
            <div class="section-title mb-75">
                <h2> <span>Jenjang</span> Pendidikan</h2>
                <p>
                    Tahapan pendidikan yang ditetapkan berdasarkan tingkat perkembangan peserta didik, tujuan yang akan
                    dicapai, dan kemampuan yang dikembangkan.
                </p>
            </div>
            <div class="course-slider-active nav-style-1 owl-carousel">
                <div class="single-course">
                    <div class="course-img">
                        <a href="#"><img class="animated" src="{{asset('assets/fronted/img/course/course-2.jpg')}}" alt=""></a>
                        <span>RA</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="#">Raudatul Atfal</a></h4>
                        <p>Merupakan jenjang pendidikan anak usia dini dalam bentuk pendidikan formal, di bawah pengelolaan Kementerian Agama.</p>
                    </div>
                    <div class="course-position-content">
                        <div class="course-btn">
                            <a class="default-btn" href="#">KUNJUNGI</a>
                        </div>
                    </div>
                </div>
                <div class="single-course">
                    <div class="course-img">
                        <a href="#"><img class="animated" src="{{asset('assets/fronted/img/course/course-3.jpg')}}" alt=""></a>
                        <span>MI</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="#">Madrasah Ibtidaiyah</a></h4>
                        <p>Jenjang paling dasar setara dengan Sekolah Dasar, yang pengelolaannya dilakukan oleh Kementerian Agama.</p>
                    </div>
                    <div class="course-position-content">
                        <div class="course-btn">
                            <a class="default-btn" href="#">KUNJUNGI</a>
                        </div>
                    </div>
                </div>
                <div class="single-course">
                    <div class="course-img">
                        <a href="#"><img class="animated" src="{{asset('assets/fronted/img/course/course-4.jpg')}}" alt=""></a>
                        <span>MTs</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="#">Madrasah Tsanawiyah</a></h4>
                        <p>Jenjang paling dasar setara dengan Sekolah Dasar, yang pengelolaannya dilakukan oleh Kementerian Agama.</p>
                    </div>
                    <div class="course-position-content">
                        <div class="course-btn">
                            <a class="default-btn" href="#">KUNJUNGI</a>
                        </div>
                    </div>
                </div>
                <div class="single-course">
                    <div class="course-img">
                        <a href="#"><img class="animated" src="{{asset('assets/fronted/img/course/course-5.jpg')}}" alt=""></a>
                        <span>MA</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="#">Madrasah Aliyah</a></h4>
                        <p>Jenjang paling dasar setara dengan Sekolah Dasar, yang pengelolaannya dilakukan oleh Kementerian Agama.</p>
                    </div>
                    <div class="course-position-content">
                        <div class="course-btn">
                            <a class="default-btn" href="#">KUNJUNGI</a>
                        </div>
                    </div>
                </div>
                <div class="single-course">
                    <div class="course-img">
                        <a href="#"><img class="animated" src="{{asset('assets/fronted/img/course/course-6.jpg')}}" alt=""></a>
                        <span>Pondok</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="#">Pondok Pesantren</a></h4>
                        <p>Jenjang paling dasar setara dengan Sekolah Dasar, yang pengelolaannya dilakukan oleh Kementerian Agama.</p>
                    </div>
                    <div class="course-position-content">
                        <div class="course-btn">
                            <a class="default-btn" href="#">KUNJUNGI</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="achievement-area pt-130 pb-115">
        <div class="container">
            <div class="section-title mb-75">
                <h2>Statistik <span> Yayasan</span></h2>
                <p>Peserta Didik, Pendidik & Tenaga Kependidikan, Tropi & Piala, dan Mata Pelajaran Yayasan Darul Hikmah Menganti  </p>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count mb-30 count-one">
                        <div class="count-img">
                            <img src="{{asset('assets/fronted/img/icon/graduated.png')}}" alt="">
                        </div>
                        <div class="count-content">
                            <h2 class="count">2489</h2>
                            <span>SISWA</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count mb-30 count-two">
                        <div class="count-img">
                            <img src="{{asset('assets/fronted/img/icon/coaching.png')}}" alt="">
                        </div>
                        <div class="count-content">
                            <h2 class="count">270</h2>
                            <span>PENDIDIK</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count mb-30 count-three">
                        <div class="count-img">
                            <img src="{{asset('assets/fronted/img/icon/trophy.png')}}" alt="">
                        </div>
                        <div class="count-content">
                            <h2 class="count">476</h2>
                            <span>TROPI & PIALA</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count mb-30 count-four">
                        <div class="count-img">
                            <img src="{{asset('assets/fronted/img/icon/open-book.png')}}" alt="">
                        </div>
                        <div class="count-content">
                            <h2 class="count">76</h2>
                            <span>PELAJARAN</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider-wrap mt-45">
                <div class="testimonial-text-slider">
                    <div class="testi-content-wrap">
                        <div class="testi-big-img">
                            <img alt="" src="{{asset('assets/fronted/img/testimonial/testi-b1.jpg')}}">
                        </div>
                        <div class="row no-gutters">
                            <div class="ml-auto col-lg-6 col-md-12">
                                <div class="testi-content bg-img default-overlay" style="background-image:url({{asset('assets/fronted/img/bg/testi.png')}});">
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
                                <div class="testi-content bg-img default-overlay" style="background-image:url({{asset('assets/fronted/img/bg/testi.png')}});">
                                    <div class="quote-style quote-left">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <p>
                                        Pendidikan dan pengajaran di dalam Republik Indonesia harus berdasarkan kebudayaan
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
                                <div class="testi-content bg-img default-overlay" style="background-image:url({{asset('assets/fronted/img/bg/testi.png')}});">
                                    <div class="quote-style quote-left">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <p>
                                        Orang yang mempunyai kecerdasan budi pekerti itu senantiasa memikir-mikirkan dan
                                        merasa-rasakan serta selalu memakai ukuran, timbangan dan dasar-dasar yang pasti dan
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
    <div class="register-area bg-img pt-130 pb-130" style="background-image:url({{asset('assets/fronted/img/bg/bg-2.jpg')}});">
        <div class="container">
            <div class="section-title-2 mb-75 white-text">
                <h2>Daftar <span>Sekarang</span></h2>
                <p>Penerimaan Peserta Didik Baru (PPDB) Tahun Pelajaran 2020/2021 Jenjang PAUD, RA, MI, MTs dan MA</p>
            </div>
            <div class="register-wrap">
                <div id="register-3" class="mouse-bg">
                    <div class="winter-banner">
                        <img src="{{asset('assets/fronted/img/banner/regi-1.png')}}" alt="">
                        <div class="winter-content">
                            <span>TAHUN PELAJARAN </span>
                            <h3>20/21</h3>
                            <span>PENDAFTARAN </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-md-8">
                        <div class="register-form">
                            <h4>Gratis Biaya Pendaftaran</h4>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="name" placeholder="Nama Lengkap" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="name" placeholder="Tempat Tanggal Lahir" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="name" placeholder="Nomor Handphone" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="name" placeholder="Email" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-form-style">
                                            <textarea name="message" placeholder="Pesan Singkat"></textarea>
                                            <button class="submit default-btn" type="submit">KIRIM SEKARANG</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="register-1" class="mouse-bg"></div>
        <div id="register-2" class="mouse-bg"></div>
    </div>
    <div class="teacher-area pt-130 pb-100">
        <div class="container">
            <div class="section-title mb-75">
                <h2>Pendidik <span>Tenaga Kependidikan</span></h2>
                <p>Sekilas para pendidik & Tenaga Kependidikan terbaik Yayasan Darul Hikmah Menganti </p>
            </div>
            <div class="custom-row">
                <div class="custom-col-5">
                    <div class="single-teacher mb-30">
                        <div class="teacher-img">
                            <img src="{{asset('assets/fronted/img/teacher/teacher-1.jpg')}}" alt="">
                        </div>
                        <div class="teacher-content-visible">
                            <h4>Sholihin</h4>
                            <h5>Pendidik</h5>
                        </div>
                        <div class="teacher-content-wrap">
                            <div class="teacher-content">
                                <h4>Sholihin, S.Ag.</h4>
                                <h5>Pendidik</h5>
                                <p>Guru Bahasa Arab</p>
                                <div class="teacher-social">
                                    <ul>
                                        <li><a class="whatsapp" href="#"><i class="fa fa-whatsapp"></i></a></li>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-col-5">
                    <div class="single-teacher mb-30">
                        <div class="teacher-img">
                            <img src="{{asset('assets/fronted/img/teacher/teacher-2.jpg')}}" alt="">
                        </div>
                        <div class="teacher-content-visible">
                            <h4>Finayanti</h4>
                            <h5>Pendidik</h5>
                        </div>
                        <div class="teacher-content-wrap">
                            <div class="teacher-content">
                                <h4>Finayanti, S.Pd.</h4>
                                <h5>Pendidik</h5>
                                <p>Guru Bahasa Indonesia</p>
                                <div class="teacher-social">
                                    <ul>
                                        <li><a class="whatsapp" href="#"><i class="fa fa-whatsapp"></i></a></li>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-col-5">
                    <div class="single-teacher mb-30">
                        <div class="teacher-img">
                            <img src="{{asset('assets/fronted/img/teacher/teacher-3.jpg')}}" alt="">
                        </div>
                        <div class="teacher-content-visible">
                            <h4>Naili</h4>
                            <h5>Pendidik</h5>
                        </div>
                        <div class="teacher-content-wrap">
                            <div class="teacher-content">
                                <h4>Naili Vidya Yulistyana, S.Pd., M.Pd.</h4>
                                <h5>Pendidik</h5>
                                <p>Guru Bahasa Arab</p>
                                <div class="teacher-social">
                                    <ul>
                                        <li><a class="whatsapp" href="#"><i class="fa fa-whatsapp"></i></a></li>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-col-5">
                    <div class="single-teacher mb-30">
                        <div class="teacher-img">
                            <img src="{{asset('assets/fronted/img/teacher/teacher-4.jpg')}}" alt="">
                        </div>
                        <div class="teacher-content-visible">
                            <h4>Zahri</h4>
                            <h5>Pendidik</h5>
                        </div>
                        <div class="teacher-content-wrap">
                            <div class="teacher-content">
                                <h4>Zahri Tamam</h4>
                                <h5>Pendidik</h5>
                                <p>Guru Bahasa Inggris Madrasah Aliyah.</p>
                                <div class="teacher-social">
                                    <ul>
                                        <li><a class="whatsapp" href="#"><i class="fa fa-whatsapp"></i></a></li>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-col-5">
                    <div class="single-teacher mb-30">
                        <div class="teacher-img">
                            <img src="{{asset('assets/fronted/img/teacher/teacher-5.jpg')}}" alt="">
                        </div>
                        <div class="teacher-content-visible">
                            <h4>Shima</h4>
                            <h5>Pendidik</h5>
                        </div>
                        <div class="teacher-content-wrap">
                            <div class="teacher-content">
                                <h4>Shima Elya Fahadah</h4>
                                <h5>Pendidik</h5>
                                <p>Guru Mata Pelajaran Biologi</p>
                                <div class="teacher-social">
                                    <ul>
                                        <li><a class="whatsapp" href="#"><i class="fa fa-whatsapp"></i></a></li>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="event-area bg-img default-overlay pt-130 pb-130" style="background-image:url({{asset('assets/fronted/img/bg/bg-3.jpg')}});">
        <div class="container">
            <div class="section-title mb-75">
                <h2><span>Agenda</span> Mendatang</h2>
                <p>Agenda, Kegiatan & Acara Mendatang di Yayasan Darul Hikmah Menganti</p>
            </div>
            <div class="event-active owl-carousel nav-style-1">
                @foreach($events as $event)
                <div class="single-event event-white-bg">
                    <div class="event-img">
                        <a href="{{route('event.detail', $event->event_id)}}">
                            <img src="{{asset($event->event_image == null ? 'assets/fronted/img/event/event.jpg' : $event->event_image)}}" alt="">
                        </a>
                        <div class="event-date-wrap">
                            <span class="event-date">{{\Carbon\Carbon::parse($event->event_date)->formatLocalized('%I')}}</span>
                            <span>{{\Carbon\Carbon::parse($event->event_date)->formatLocalized('%b')}}</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3><a href="{{route('event.detail', $event->event_id)}}">{{$event->event_name}}</a></h3>
                        <p>{{substr($event->event_content, 0, 50)}}</p>
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
                @endforeach
            </div>
        </div>
    </div>
    <div class="blog-area pt-130 pb-100">
        <div class="container">
            <div class="section-title mb-75">
                <h2>Berita <span>Terbaru</span></h2>
                <p>Berita, Kegiatan, Acara terbaru dari Yayasan Darul Hikmah Menganti</p>
            </div>
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-3 col-md-6">
                    <div class="single-blog mb-30">
                        <div class="blog-img">
                            <a href="{{route('article.detail', $post->post_id)}}">
                                <img src="{{asset($post->post_image == null ? 'assets/fronted/img/blog/blog-1.jpg' : $post->post_image)}}" alt="">
                            </a>
                        </div>
                        <div class="blog-content-wrap">
                            <span>{{\App\Models\Category::name($post->post_category)}}</span>
                            <div class="blog-content">
                                <h4><a href="{{route('article.detail', $post->post_id)}}">{{$post->post_title}}</a></h4>
                                <p>{{substr($post->post_content, 0, 50)}}</p>
                                <div class="blog-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> {{$post->user->user_name}}</a></li>
                                        <li><a href="#"><i class="fa fa-comments-o"></i> {{$post->comment->count()}}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-date">
                                <a href="#"><i class="fa fa-calendar-o"></i> {{$post->created_at()}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
