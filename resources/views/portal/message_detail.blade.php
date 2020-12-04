@extends('portal.layouts.master')

@section('js')
    <link href="{{asset('assets/portal/js/plugins/summernote/summernote-bs4.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('assets/portal/js/plugins/selects/select2.min.js')}}"></script>
    <script src="{{asset('assets/portal/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('assets/portal/js/plugins/notifications/pnotify.min.js')}}"></script>
    <script src="{{asset('assets/portal/js/plugins/media/fancybox.min.js')}}"></script>
    <script src="{{asset('assets/portal/js/plugins/styling/uniform.min.js')}}"></script>
@endsection
@section('jspage')
    <script src="{{asset('assets/portal/sites/portal/js/message_detail.js')}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item">Perpesanan</span>
    <span class="breadcrumb-item active">{{$message->message_subject}}</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="flex-fill overflow-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="media flex-column flex-md-row">
                            <a href="#" class="d-none d-md-block mr-md-3 mb-3 mb-md-0">
                                <span class="btn bg-teal-400 btn-icon btn-lg rounded-round">
                                    <span class="letter-icon"></span>
                                </span>
                            </a>
                            <div class="media-body">
                                <h6 class="mb-0">{{$message->message_subject}}</h6>
                                <div class="letter-icon-title font-weight-semibold">{{$message->message_name}} <a href="#">&lt;{{$message->message_email}}&gt;</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p style="text-align: justify">{{$message->message_content}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
