@extends('layouts.app')

@section('title', 'Tambah User')

@section('css')
    <style>
        .dark-mode input:-webkit-autofill,
        .dark-mode input:-webkit-autofill:focus,
        .dark-mode input:-webkit-autofill:hover,
        .dark-mode select:-webkit-autofill,
        .dark-mode select:-webkit-autofill:focus,
        .dark-mode select:-webkit-autofill:hover,
        .dark-mode textarea:-webkit-autofill,
        .dark-mode textarea:-webkit-autofill:focus,
        .dark-mode textarea:-webkit-autofill:hover {
            -webkit-text-fill-color: #000 !important;
        }
    </style>
@endsection

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
                        <form method="POST" action="{{ route('admin.user.store') }}" enctype='multipart/form-data' autocomplete="off">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_roles">Roles</label>
                                    <select name="id_roles" required class="custom-select form-control-border"
                                        id="id_roles">
                                        <option selected value="99" selected>Kontraktor</option>
                                        <option value="11">Admin</option>
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
                                <input type="hidden" name="status" value="Ready" required>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                @endsection
