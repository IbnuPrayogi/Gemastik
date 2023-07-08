@extends('layouts.app')

@section('title', 'Tambah User')

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
                        <!-- /.card-header 
                        <th style="width: 10px">No</th>
                                        <th>Nama Company</th>
                                        <th>Nama Pemilik</th>
                                        <th>ID Pinpoint</th>
                                        <th>Email</th>
                                        <th>Rekening</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>More</th>-->
                        <!-- form start -->
                        <form method="POST" action="{{ route('pelaporan.update',$pelaporan->id) }}" enctype='multipart/form-data'>
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- <div class="form-group">
                                    <label for="id_role">Roles</label>
                                    <select name="id_role" required class="custom-select form-control-border"
                                        id="id_role">
                                        <option selected>=== PILIH ROLE ===</option>
                                        <option value="">SuperAdmin</option>
                                        <option value="">OP</option>
                                    </select>
                                </div> --}}

                                <div class="form-group">
                                    <label for="email">Nama Proyek</label>
                                    <input name="nama_proyek" type="text" class="form-control" id="nama_proyek" value="{{ $pelaporan->nama_proyek }}"
                                        placeholder="{{ $pelaporan->nama_proyek }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lokasi">Nama Lokasi</label>
                                    <input name="nama_lokasi" class="form-control" id="nama_lokasi" placeholder="{{ $pelaporan->nama_lokasi }}" value="{{ $pelaporan->nama_lokasi }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Nama Perusahaan</label>
                                    <input name="nama_company" type="nama_company" class="form-control" id="nama_company" value="{{ $pelaporan->nama_company }}"
                                        placeholder="{{ $pelaporan->nama_company }}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Longitude</label>
                                    <input name="longitude" class="form-control" id="longitude" placeholder="{{ $pelaporan->longitude }}" value="{{ $pelaporan->longitude }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input name="latitude" class="form-control" id="latitude" placeholder="{{ $pelaporan->latitude }}" value="{{ $pelaporan->latitude }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_end">Tanggal Selesai</label>
                                    <input type="datetime-local" name="tgl_end" class="form-control" id="tgl_end" placeholder="{{ $pelaporan->tgl_end}}" value="{{ $pelaporan->tgl_end}}"
                                        required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                @endsection
