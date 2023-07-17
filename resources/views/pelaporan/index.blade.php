@extends('layouts.app')

@section('title', 'Kelola Laporan')

@section('css')
    <style>
        #example1_filter, #example1_paginate {
            display: flex;
            justify-content: end;
        }
    </style>
@endsection

@section('content')
    <!--./Tabel User-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card overflow-x-scroll">
                        <div class="card-header">
                            <h3 class="card-title">Semua Laporan</h3>
                        </div>
                        <!-- /.card-header -->
                        {{-- <div class="py-3 px-4 row">
                            <label class="col-sm-3 col-form-label">
                                berdasarkan bulan mulai:
                            </label>
                              <select class="col-sm-9 col-form-label rounded-2" name="search-input" id="search-input">
                                <option value="jan">Januari</option>
                                <option value="feb">Februari</option>
                                <option value="mar">Maret</option>
                                <option value="apr">April</option>
                                <option value="may">Mei</option>
                                <option value="jun">Juni</option>
                                <option value="jul">Juli</option>
                                <option value="aug">Agustus</option>
                                <option value="sep">September</option>
                                <option value="october">Oktober</option>
                                <option value="nov">November</option>
                                <option value="de">Desember</option>
                              </select>
                        </div> --}}
                        <div class="card-body" style="overflow-x: overlay">
                            <table id="example1" class="table table-bordered text-center align-items-center">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Panjang Perbaikan (Meter)</th>
                                        <th>Lebar Perbaikan (Meter)</th>
                                        <th>Nama Lokasi</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Foto</th>
                                        <th>Tanggal Dimulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Status</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ($pelaporans as $pelaporan => $value)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $value->panjang_perbaikan }}</td>
                                            <td>{{ $value->lebar_perbaikan }}</td>
                                            <td>{{ $value->nama_lokasi }}</td>
                                            <td>{{ $value->nama_company }}</td>
                                            <td>{{ $value->longitude }}</td>
                                            <td>{{ $value->latitude }}</td>
                                            <td>{{ Str::limit($value->foto, 5) }}</td>
                                            <td>{{ $value->tgl_start }}</td>
                                            @if ($value->tgl_end == null)
                                                <td>Belum Selesai</td>
                                            @else
                                                <td>{{ $value->tgl_end}}</td>
                                            @endif
                                            @if ($value->status == 1)
                                                <td>Belum Diperbaiki</td>
                                            @elseif ($value->status == 2)
                                                <td>Proses Perbaikan</td>
                                            @elseif ($value->status == 3)
                                                <td>Sudah Diperbaiki</td>
                                            @elseif ($value->status == 4)
                                                <td>Laporan Selesai</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td class="justify-content-center d-flex" style="align-items: center !important;">
                                                @if (Auth::user()->id_roles == 11)
                                                    <a href="{{ route('admin.laporan.show', $value->id) }}" class="mx-1 btn-sm btn-primary text-decoration-none">
                                                @else
                                                    <a href="{{ route('client.laporan.show', $value->id) }}" class="mx-1 btn-sm btn-primary text-decoration-none">
                                                @endif
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                @if (Auth::user()->id_roles == 11)
                                                    <a href="{{ route('admin.laporan.edit', $value->id) }}"class="mx-1 btn-sm btn-light text-decoration-none">
                                                        <i class="fa-solid fa-marker"></i>
                                                    </a>
                                                @elseif (Auth::user()->id_roles == 99 && $value->status < 3)
                                                    <a href="{{ route('client.laporan.edit', $value->id) }}"class="mx-1 btn-sm btn-light text-decoration-none">
                                                        <i class="fa-solid fa-marker"></i>
                                                    </a>
                                                @endif
                                                @if (Auth::user()->id_roles == 99 && $value->status < 2)
                                                    <!-- Button trigger modal -->
                                                    <a role="button" class="mx-1 btn-sm btn-danger text-decoration-none" data-toggle="modal" data-target="#hapus-{{ $value->id }}">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div id="hapus-{{ $value->id }}" class="modal fade" tabindex="-1"
                                                        role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog bd-danger">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">
                                                                        <strong>Hapus Laporan</strong>
                                                                    </h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus laporan ini? <br>
                                                                    "Nama perusahaan {{ $value->nama_company }} di {{ $value->nama_lokasi }}"
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('client.laporan.destroy', $value->id) }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <input type="submit" class="btn btn-danger light" value="Hapus">
                                                                        <button type="button" class="btn btn-primary"
                                                                            data-dismiss="modal">Tidak</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal -->
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(function () {
            $("#example1").DataTable({
            "lengthChange": true, "autoWidth": true,
            "buttons": ["csv", "excel", "pdf", "print"],
                
            
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endsection