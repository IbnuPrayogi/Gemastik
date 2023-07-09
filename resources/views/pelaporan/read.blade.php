@extends('layouts.app')

@section('title', 'Lihat Laporan')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Lihat Laporan {{$pelaporan->nama_company}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_lokasi">Nama Lokasi</label>
                                <input name="nama_lokasi" class="form-control" id="nama_lokasi" placeholder="{{ $pelaporan->nama_lokasi }}" value="{{ $pelaporan->nama_lokasi }}"
                                disabled>
                            </div>
                            <div class="form-group">
                                <label for="password">Nama Perusahaan</label>
                                <input name="nama_company" type="nama_company" class="form-control" id="nama_company" value="{{ $pelaporan->nama_company }}"
                                placeholder="{{ $pelaporan->nama_company }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Panjang Perbaikan</label>
                                <input name="panjang_perbaikan" type="text" class="form-control" id="panjang_perbaikan" value="{{ $pelaporan->panjang_perbaikan }}"
                                    placeholder="{{ $pelaporan->panjang_perbaikan }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Lebar Perbaikan</label>
                                <input name="lebar_perbaikan" type="text" class="form-control" id="lebar_perbaikan" value="{{ $pelaporan->lebar_perbaikan }}"
                                    placeholder="{{ $pelaporan->lebar_perbaikan }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nama">Longitude</label>
                                <input name="longitude" class="form-control" id="longitude" placeholder="{{ $pelaporan->longitude }}" value="{{ $pelaporan->longitude }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input name="latitude" class="form-control" id="latitude" placeholder="{{ $pelaporan->latitude }}" value="{{ $pelaporan->latitude }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="tgl_end">Tanggal Mulai</label>
                                <input type="datetime" name="tgl_start" class="form-control" id="tgl_start" placeholder="{{ $pelaporan->tgl_start}}" value="{{ $pelaporan->tgl_start}}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="tgl_end">Tanggal Selesai</label>
                                <input type="datetime" name="tgl_end" class="form-control" id="tgl_end" placeholder="{{ $pelaporan->tgl_end}}" value="{{ $pelaporan->tgl_end}}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                @endsection
