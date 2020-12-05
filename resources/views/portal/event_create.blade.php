@extends('portal.layouts.master')
@section('js')
    <link href="{{asset('assets/portal/js/plugins/summernote/summernote-bs4.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('assets/portal/js/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/portal/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/portal/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('assets/portal/js/plugins/notifications/pnotify.min.js')}}"></script>
    <script src="{{asset('assets/portal/js/plugins/media/fancybox.min.js')}}"></script>
    <script src="{{asset('assets/portal/js/plugins/styling/uniform.min.js')}}"></script>
@endsection
@section('jspage')
    <script src="{{asset('assets/portal/sites/portal/js/event_create.js')}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item">Acara/Kegiatan</span>
    <span class="breadcrumb-item active">Tambah</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-white header-elements-inline">
                            <h6 class="card-title font-weight-semibold">TAMBAH ACARA/KEGIATAN</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="event_title" placeholder="Judul Acara/Kegiatan">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Tanggal Mulai :</label>
                                    <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                    </span>
                                        <input type="text" class="form-control" id="event_date_start" value="04/12/2020">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tanggal Selesai :</label>
                                    <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                    </span>
                                        <input type="text" class="form-control" id="event_date_end" value="04/12/2020">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Waktu :</label>
                                    <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-alarm"></i></span>
                                    </span>
                                        <input type="text" class="form-control" id="event_time" value="24:00:00">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tempat Pelaksanaan :</label>
                                    <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-location3"></i></span>
                                    </span>
                                        <input type="text" class="form-control" id="event_place" >
                                    </div>
                                </div>
                            </div>
                            <div id="event_content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-labeled btn-labeled-left col-md-12" id="submit" value="store"><b><i class="icon-floppy-disk"></i></b>SIMPAN</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <h6 class="card-title font-weight-semibold">GAMBAR</h6>
                        </div>
                        <div class="card-img-actions">
                            <img class="img-fluid image-view" src="{{asset('assets/fronted/img/blog/blog-1.jpg')}}" alt="">
                        </div>
                        <div class="card-body">
                            <input type="file" id="event_image" class="form-control-uniform" data-fouc>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')

@endsection
