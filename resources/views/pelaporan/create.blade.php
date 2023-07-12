@extends('layouts.app')

@section('title', 'Buat Laporan')

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
                            <h3 class="card-title">Tambah User baru</h3>
                        </div>
                        <form method="POST" action="{{ route('client.laporan.store') }}" enctype='multipart/form-data'>
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_lokasi">Nama Lokasi</label>
                                    <input name="nama_lokasi" class="form-control" id="nama_lokasi" placeholder="Nama Lokasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_company">Nama Perusahaan</label>
                                    <input name="nama_company" type="text" class="form-control text-white" id="nama_company"
                                    value="{{ Auth::user()->nama_company }}" disabled>
                                    <input name="nama_company" type="hidden" class="form-control" id="nama_company"
                                    value="{{ Auth::user()->nama_company }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="panjang_perbaikan">Panjang Perbaikan</label>
                                    <div class="input-group">
                                        <input name="panjang_perbaikan" type="text" class="form-control" id="panjang_perbaikan" value="1" required>
                                        <span class="input-group-text">Meter</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lebar_perbaikan">Lebar Perbaikan</label>
                                    <div class="input-group">
                                        <input name="lebar_perbaikan" type="text" class="form-control" id="lebar_perbaikan" value="1" required>
                                        <span class="input-group-text">Meter</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="coordinates">Longitude dan Latitude</label>
                                    <input name="coordinates" class="form-control" id="coordinates" placeholder="contoh : -4.8893,113.9213" value=""
                                        required>
                                </div>
                                <div class="form-group"> 
                                    <label for="foto">Upload Foto Lokasi</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="foto" name="foto" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_end">Tanggal Mulai</label>
                                    <input type="datetime" name="tgl_start" class="form-control" id="tgl_start" value="{{ date('Y-m-d H:i:s') }}"
                                        required>
                                </div>
                                <input type="hidden" name="tgl_end" class="form-control" id="tgl_end" value=""
                                    required>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                @endsection
