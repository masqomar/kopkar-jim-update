@extends('adminlte::page')

@section('title', 'Angsuran Pembiayaan')

@section('content_header')
<h1 class="m-0 text-dark">Angsuran Pembiayaan</h1>
@stop

@section('content')
<form action="{{route('angsuran.store')}}" method="post">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Kode Pembiayaan</label>
                        <input type="text" class="form-control @error('kode_pembiayaan') is-invalid @enderror" id="exampleInputName" placeholder="Nama anggota" name="kode_pembiayaan" value="{{$pembiayaanID->kode_pembiayaan ?? old('kode_pembiayaan')}}" readonly>
                        @error('kode_pembiayaan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="hidden" name="user_id" value="{{$pembiayaan->id}}">
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="nama_anggota" value="{{$pembiayaan->nama}}" readonly>
                        @error('user_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_anggota" value="{{$pembiayaan->nama_barang}}" readonly>
                        @error('nama_barang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>Kode Pembiayaan</th>
                                <th>Barang</th>
                                <th>Jumlah Pembiayaan</th>
                                <th>Total Angsuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$pembiayaanID->kode_pembiayaan}}</td>
                                <td>{{$pembiayaan->nama_barang}}</td>
                                <td>@rupiah($pembiayaanID->jumlah_pembiayaan)</td>
                                <td>@rupiah($cicilan)</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>

                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" class="form-control @error('setor_bayar') is-invalid @enderror" placeholder="Nominal" name="setor_bayar" required>
                        @error('setor_bayar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control @error('keterangan_setor') is-invalid @enderror" placeholder="Keterangan" name="keterangan_setor" required></textarea>
                        @error('keterangan_setor') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class=" card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('angsuran.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @stop