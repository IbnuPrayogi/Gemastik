@extends('layouts.app')

@section('title', 'Kelola User')

@section('content')
    <!--./Tabel User-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card overflow-x-scroll">
                        <div class="card-header">
                            <h3 class="card-title">Semua User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x: overlay">
                            <table class="table table-bordered text-center align-items-center">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Nama Pemilik</th>
                                        <th>Roles</th>
                                        <th>Email</th>
                                        <th>Rekening</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user => $value)
                                        <tr>
                                            <td class="text-center">{{ $users->firstItem() + $user }}</td>
                                            <td>{{ $value->nama_company }}</td>
                                            <td>{{ $value->nama_pemilik }}</td>
                                            @if ($value->id_role == 99)
                                                <td>Kontraktor</td>
                                            @if ($value->id_role == 11)
                                                <td>Admin</td>
                                            @else
                                                <td>Tidak Terdaftar</td>
                                            @endif
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->rekening }}</td>
                                            <td>{{ Str::limit($value->alamat, 10) }}</td>
                                            <td>{{ $value->status }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td class="justify-content-center d-flex">
                                                <a href="{{ route('user.show', $value->id) }}" class="mx-1 btn-sm btn-primary text-decoration-none">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('user.edit', $value->id) }}"class="mx-1 btn-sm btn-light text-decoration-none">
                                                    <i class="fa-solid fa-marker"></i>
                                                </a>
                                                <!-- Button trigger modal -->
                                                <a class="mx-1 btn-sm btn-danger text-decoration-none" data-toggle="modal" data-target="#hapus-{{ $value->id }}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                                <!-- Modal -->
                                                <div id="hapus-{{ $value->id }}" class="modal fade" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog bd-danger">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">
                                                                    <strong>Hapus User</strong>
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus user ini? <br>
                                                                "{{ $value->nama_company }}"
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('user.destroy', $value->id) }}"
                                                                    method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <input type="submit" class="btn btn-danger light"
                                                                        name="" id="" value="Hapus">
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-dismiss="modal">Tidak</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
