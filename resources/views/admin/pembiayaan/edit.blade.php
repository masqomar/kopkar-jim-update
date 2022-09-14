@extends('adminlte::page')

@section('title', 'Proses Pengajuan Pembiayaan')

@section('content_header')
<h1 class="m-0 text-dark">Proses Pengajuan Pembiayaan</h1>
@stop

@section('content')
<form action="{{route('pembiayaan.update', $pembiayaanID)}}" method="post">
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
                                <td>{{$pembiayaanID->user->nama}}</td>
                            </tr>
                            <tr>
                                <th scope="col">No Anggota</th>
                                <td>{{$pembiayaanID->user->no_anggota}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Produk Koperasi</th>
                                <td>{{$pembiayaanID->produkKoperasi->nama_produk}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Tanggal Pengajuan</th>
                                <td>{{$pembiayaanID->tanggal_pengajuan}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Catatan Pengajuan</th>
                                <td>{{$pembiayaanID->catatan}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <hr>
                    <div class="form-group">
                        <label>Kode Pembiayaan</label>
                        <input type="text" class="form-control @error('kode_pembiayaan') is-invalid @enderror" placeholder="Kode Pembiayaan" name="kode_pembiayaan" value="{{$pembiayaanID->kode_pembiayaan ?? old('kode_pembiayaan')}}" readonly>
                        @error('kode_pembiayaan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Nama Barang" name="nama_barang" value="{{$pembiayaanID->nama_barang ?? old('nama_barang')}}" required>
                        @error('nama_barang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Spesifikasi</label>
                        <input type="text" class="form-control @error('spek_barang') is-invalid @enderror" placeholder="Spesifikasi" name="spek_barang" value="{{$pembiayaanID->spek_barang ?? old('spek_barang')}}" required>
                        @error('spek_barang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Nominal Pembiayaan</label>
                        <input type="number" class="form-control @error('jumlah_pembiayaan') is-invalid @enderror" placeholder="Nominal Pembiayaan" name="jumlah_pembiayaan" value="{{old('jumlah_pembiayaan')}}" required>
                        @error('jumlah_pembiayaan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Jangka Waktu <small>1 - 6 bulan</small> </label>
                        <input type="number" class="form-control @error('jangka_waktu') is-invalid @enderror" placeholder="Jangka Waktu" name="jangka_waktu" value="{{old('jangka_waktu')}}" required>
                        @error('jangka_waktu') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('pembiayaan.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @stop