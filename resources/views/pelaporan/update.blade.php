@extends('layouts.app')

@section('title', 'Edit Laporan')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit laporan di {{$pelaporan->nama_lokasi}}</h3>
                        </div>
                        <form method="POST" action="{{ route('client.laporan.update',$pelaporan->id) }}" enctype='multipart/form-data'>
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Status Proyek</label>
                                    @if ($pelaporan->status == 1)
                                        <input name="status" class="form-control" id="status" value="Belum Diperbaiki" disabled>
                                        <input type="hidden" name="status" id="status" value="2" required>
                                    @elseif ($pelaporan->status == 2)
                                        <input name="status" class="form-control" id="status" value="Proses Perbaikan" disabled>
                                        <input type="hidden" name="status" id="status" value="3" required>
                                    @elseif ($pelaporan->status == 3)
                                        <input name="status" class="form-control" id="status" value="Sudah Diperbaiki" disabled>
                                        <input type="hidden" name="status" id="status" value="4" required>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama_lokasi">Nama Lokasi</label>
                                    <input name="nama_lokasi" class="form-control" id="nama_lokasi" placeholder="{{ $pelaporan->nama_lokasi }}" value="{{ $pelaporan->nama_lokasi }}"
                                    @if ($pelaporan->status == 1)
                                        required>
                                    @else
                                        disabled>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Nama Perusahaan</label>
                                    <input name="nama_company" type="nama_company" class="form-control" id="nama_company" value="{{ $pelaporan->nama_company }}"
                                        placeholder="{{ $pelaporan->nama_company }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Panjang Perbaikan</label>
                                    <div class="input-group">
                                        <input name="panjang_perbaikan" type="text" class="form-control" id="panjang_perbaikan" value="{{ $pelaporan->panjang_perbaikan }}"
                                        @if ($pelaporan->status == 1)
                                            required>
                                        @else
                                            disabled>
                                        @endif
                                        <span class="input-group-text">Meter</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Lebar Perbaikan</label>
                                    <div class="input-group">
                                        <input name="lebar_perbaikan" type="text" class="form-control" id="lebar_perbaikan" value="{{ $pelaporan->lebar_perbaikan }}"
                                        @if ($pelaporan->status == 1)
                                            required>
                                        @else
                                            disabled>
                                        @endif
                                        <span class="input-group-text">Meter</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Longitude dan Latitude</label>
                                    <div class="input-group">
                                        <input name="longitude" class="form-control" id="longitude" value="{{ $pelaporan->longitude}},{{ $pelaporan->latitude }}"
                                            disabled>
                                        <span class="input-group-text">
                                            <a class="text-decoration-none text-white" href="https://maps.google.com/?q={{ $pelaporan->longitude }},{{ $pelaporan->latitude }}" target="_blank" rel="noreferrer noopener">
                                                <i class="fa-solid fa-map-location-dot px-1">
                                                </i> 
                                                Cek Peta
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_end">Tanggal Mulai</label>
                                    <input type="datetime" name="tgl_start" class="form-control" id="tgl_start" placeholder="{{ $pelaporan->tgl_start}}" value="{{ $pelaporan->tgl_start}}"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_end">Tanggal Selesai</label>
                                    <input type="datetime" name="tgl_end" class="form-control" id="tgl_end" value="@if ($pelaporan->tgl_end==null) Belum Selesai @else {{ $pelaporan->tgl_end}} @endif"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex flex-column">
                                        <label for="foto">Foto</label>
                                        <a class="text-decoration-none" role="button" data-toggle="modal" data-target="#image-{{ $pelaporan->id }}">
                                            <img name="foto" style="max-width: 150px; max-height: 150px; object-fit: contain;" src="{{asset('storage/images/'.$pelaporan->foto)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a class="mx-1 btn btn-primary text-decoration-none" data-toggle="modal" data-target="#update-{{ $pelaporan->id }}">
                                    @if ($pelaporan->status == 1)
                                        Mulai Perbaikan
                                    @elseif($pelaporan->status == 2)
                                        Perbaikan Selesai
                                    @elseif($pelaporan->status == 3)
                                        Laporan Selesai
                                    @endif
                                </a>
                            </div>
                            <!-- Modal -->
                            <div id="update-{{ $pelaporan->id }}" class="modal fade" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog bd-danger">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                <strong>Update Laporan</strong>
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            @if ($pelaporan->status == 1)
                                                Apakah anda yakin akan memulai proyek? <br>
                                                Setelah dimulai, detail tidak dapat diubah <br>
                                            @elseif($pelaporan->status == 2)
                                                Apakah anda yakin proyek telah selesai? <br>
                                            @elseif($pelaporan->status == 3)
                                                Apakah anda yakin biaya proyek telah dibayarkan? <br>
                                                "Nama perusahaan {{ $pelaporan->nama_company }} di {{ $pelaporan->nama_lokasi }}"
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('client.laporan.update', $pelaporan->id) }}"
                                                method="POST">
                                                @method('PUT')
                                                @csrf
                                                <input type="submit" class="btn btn-danger light" value="Ya">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Tidak</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal Image --}}
                            <div id="image-{{ $pelaporan->id }}" class="modal fade" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog bd-danger">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                <strong>Lihat Foto Laporan</strong>
                                            </h5>
                                        </div>
                                        <div class="modal-body justify-content-center d-flex">
                                            <img style="max-width: 500px; max-height: 500px; object-fit: contain;" class="px-3" src="{{asset('storage/images/'.$pelaporan->foto)}}" alt="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
