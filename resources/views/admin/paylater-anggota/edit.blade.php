@extends('adminlte::page')

@section('title', 'Proses Paylater')

@section('content_header')
<h1 class="m-0 text-dark">Proses Paylater</h1>
@stop

@section('content')
<form action="{{route('paylater-anggota.update', $paylaterID)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th scope="col">Nama Anggota</th>
                                <td>{{$paylaterID->user->nama}}</td>
                            </tr>
                            <tr>
                                <th scope="col">No Anggota</th>
                                <td>{{$paylaterID->user->no_anggota}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Tanggal Pengajuan</th>
                                <td>{{$paylaterID->tanggal_pengajuan}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Nominal</th>
                                <td>@rupiah($paylaterID->nominal_paylater)</td>
                            </tr>
                            <tr>
                                <th scope="col">Jangka Waktu</th>
                                <td>{{$paylaterID->jangka_waktu}} bulan</td>
                            </tr>
                            <tr>
                                <th scope="col">Tanggal Pelunasan</th>
                                <td>{{$paylaterID->tgl_selesai}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Catatan Pengajuan</th>
                                <td>{{$paylaterID->catatan}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <hr>
                    <div class="form-group">
                        <label>Kode Paylater</label>
                        <input type="text" class="form-control @error('kode_paylater') is-invalid @enderror" placeholder="Kode Pembiayaan" name="kode_paylater" value="{{$paylaterID->kode_paylater ?? old('kode_paylater')}}" readonly>
                        @error('kode_paylater') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Provider</label>
                        <input type="text" class="form-control @error('provider') is-invalid @enderror" placeholder="Kode Pembiayaan" name="provider" value="{{$paylaterID->paylaterProvider->nama ?? old('provider')}}" readonly>
                        @error('provider') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Kode Bank</label>
                        <input type="text" class="form-control @error('bank') is-invalid @enderror" placeholder="Kode Pembiayaan" name="bank" value="{{$paylaterID->bank->kode_bank}} || {{$paylaterID->bank->nama_bank}}" readonly>
                        @error('bank') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>No Rekening</label>
                        <input type="text" class="form-control @error('no_rekening') is-invalid @enderror" placeholder="Kode Pembiayaan" name="no_rekening" value="{{$paylaterID->no_rekening}}" readonly>
                        @error('no_rekening') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Atas Nama</label>
                        <input type="text" class="form-control @error('atas_nama') is-invalid @enderror" placeholder="Kode Pembiayaan" name="atas_nama" value="{{$paylaterID->atas_nama}}" readonly>
                        @error('atas_nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Bukti Transfer:</label>
                        <input type="file" name="bukti_bayar" class="form-control @error('bukti_bayar') is-invalid @enderror">

                        @error('bukti_bayar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('paylater-anggota.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @stop