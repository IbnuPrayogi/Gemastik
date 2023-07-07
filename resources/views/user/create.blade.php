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
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_role">Roles</label>
                                    <select name="id_role" required class="custom-select form-control-border"
                                        id="id_role">
                                        <option value="11">Admin</option>
                                        <option value="99" selected>Kontraktor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input name="nama" class="form-control" id="nama" placeholder="Masukkan Nama..."
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
                                        placeholder="Masukan Password...">
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
