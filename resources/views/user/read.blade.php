@extends('layouts.app')

@section('title', 'Lihat User {{ $users->nama_company }}}}')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                <div class="card-body">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama_company" id="nama_company" value="{{ $users->nama_company }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Pemilik</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Nama Pemilik" name="nama_pemilik" id="nama_pemilik" value="{{ $users->nama_pemilik }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                @if ($users->id_role == 99)
                                    <input type="text" class="form-control" placeholder="" name="id_role" id="id_role" value="kontraktor" disabled>
                                @if ($users->id_role == 11)
                                    <input type="text" class="form-control" placeholder="" name="id_role" id="id_role" value="admin" disabled>
                                @else
                                    <input type="text" class="form-control" placeholder="" name="id_role" id="id_role" value="tidak terdaftar" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="youremail@mail.com" name="email" id="email" value="{{ $users->email }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Rekening</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="" name="rekening" id="rekening" value="{{ $users->rekening }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="" name="alamat" id="alamat" value="{{ $users->alamat }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="" name="status" id="status" value="{{ $users->status }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
