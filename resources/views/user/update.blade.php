@extends('layouts.app')

@section('title', $tittle ?? 'Edit User')

@section('content')
<!-- Main content -->
<section class="container">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit User {{ $users->nama_company }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form action="{{route('admin.user.update', $users->id)}}" method="POST">
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
                                    @if ($users->id_roles == 99)
                                        Kontraktor
                                    </option>
                                    <option value="11">Admin</option>
                                    @elseif ($users->id_roles == 11)
                                        Admin
                                    </option>
                                    <option value="99">Kontraktor</option>
                                    @else
                                        Tidak terdaftar
                                    </option>
                                    <option value="11">Admin</option>
                                    <option value="99">Kontraktor</option>
                                    @endif
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
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <a class="btn btn-primary text-decoration-none" data-toggle="modal" data-target="#reset-{{ $users->id }}">
                            Reset Password User
                        </a>
                        <div id="reset-{{ $users->id }}" class="modal fade" tabindex="-1"
                            role="dialog" aria-hidden="true">
                            <div class="modal-dialog bd-danger">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">
                                            <strong>Hapus User</strong>
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin reset password user? <br>
                                        "{{ $users->nama_company }}"
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.user.reset', $users->id) }}"
                                            method="POST">
                                            @csrf
                                            <input type="submit" class="btn btn-danger light"
                                                name="" id="" value="Reset">
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Tidak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script>
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
    </script>
    <script src="{{ asset('lte/build/toasts.js') }}"></script>
@endsection