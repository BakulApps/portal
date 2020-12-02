@extends('portal.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="icon-user icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="card-title">199 Siswa</h5>
                    <p class="mb-3">Jumlah Total Siswa</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="icon-graduation icon-2x text-danger border-danger border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="card-title"> 71Siswa</h5>
                    <p class="mb-3">Jumlah Siswa Lulus</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="icon-file-empty icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="card-title">71 Nilai</h5>
                    <p class="mb-3">Jumlah Nilai</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="icon-credit-card icon-2x text-info border-info border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="card-title">71 Lunas</h5>
                    <p class="mb-3">Jumlah Siswa Lunas</p>
                </div>
            </div>
        </div>
    </div>
@endsection
