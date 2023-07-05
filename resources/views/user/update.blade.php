@extends('layouts.app')

@section('title', 'Edit User {{ $users->nama_company }}}}')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form action="{{route('user.update', $users->id)}}" method="POST">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama_company" id="nama_company" value="{{ $users->nama_company }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Nama Pemilik</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Nama Pemilik" name="nama_pemilik" id="nama_pemilik" value="{{ $users->nama_pemilik }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Role</label>
                                    <select name="id_role" required class="custom-select form-control-border"
                                        id="id_role">
                                        <option selected value="{{$users->id_role}}">
                                            @if ($users->id_role == 99)
                                                Kontraktor
                                            @if ($users->id_role == 11)
                                                Admin
                                            @else
                                                Tidak terdaftar
                                            @endif
                                        </option>
                                        <option value="11">Admin</option>
                                        <option value="99">Kontraktor</option>
                                    </select>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="youremail@mail.com" name="email" id="email" value="{{ $users->email }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Rekening</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="" name="rekening" id="rekening" value="{{ $users->rekening }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="" name="alamat" id="alamat" value="{{ $users->alamat }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="" name="status" id="status" value="{{ $users->status }}" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
