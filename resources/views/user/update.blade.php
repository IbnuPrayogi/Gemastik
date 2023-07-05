@extends('layouts.app')

@section('title', 'Kelola User')

@section('content')
    <!--./Tabel User-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Semua User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama User</th>
                                        <th>Role</th>
                                        <th>More</th>
                                        {{-- <th style="width: 40px">Label</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user => $value)
                                        <tr>
                                            <td class="text-center">{{ $users->firstItem() + $user }}</td>
                                            <td>{{ $value->nama }}</td>
                                            <td>{{ $value->id_role }}</td>
                                            <td>
                                                <a href="{{ route('admin.user.show', $value->id) }}" class="btn btn-info"><i
                                                        class="fa-solid fa-eye"></i>Lihat</a>
                                                <a href="{{ route('admin.user.edit', $value->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa-solid fa-marker"></i> Ubah
                                                </a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#hapus-{{ $value->id }}"><i
                                                        class="fa-solid fa-trash-can"></i> Hapus</button>
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
                                                                "{{ $value->nama }}"
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('admin.user.destroy', $value->id) }}"
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
