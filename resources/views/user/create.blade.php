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
                        <form method="POST" action="{{ route('user.store') }}" enctype='multipart/form-data'>
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_roles">Roles</label>
                                    <select name="id_roles" required class="custom-select form-control-border"
                                        id="id_roles">
                                        <option selected>=== PILIH ROLE ===</option>
                                        <option value="11">SuperAdmin</option>
                                        <option value="99">OP</option>
                                        <option value="00">Penristek</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_company">Nama Perusahaan</label>
                                    <input name="nama_company" class="form-control" id="nama_company" placeholder="Masukkan Nama Perusahaan..."
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemilik">Nama Pemilik</label>
                                    <input name="nama_pemilik" class="form-control" id="nama_pemilik" placeholder="Masukkan Nama Pemilik..."
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input name="email" type="email" class="form-control" id="email"
                                        placeholder="Masukan Email..." required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Masukan Password..." required>
                                </div>
                                <div class="form-group">
                                    <label for="image_users">Foto Profil</label>
                                    <input name="image_users" type="file" class="form-control" id="image_users"
                                        placeholder="Masukan image_users..." accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label for="rekening">Rekening</label>
                                    <input name="rekening" type="rekening" class="form-control" id="rekening"
                                        placeholder="Masukan Rekening...">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input name="alamat" type="alamat" class="form-control" id="alamat"
                                        placeholder="Masukan Alamat...">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input name="status" type="status" class="form-control" id="status"
                                        placeholder="Masukan Status...">
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
