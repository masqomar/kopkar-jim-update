@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
<h1 class="m-0 text-dark">Tambah User</h1>
@stop

@section('content')
<form action="{{route('users.store')}}" method="post">
    @csrf

    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Biodata Calon Anggota</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="kelamin" class="form-control @error('kelamin') is-invalid @enderror">
                            <option value="">--Jenis Kelamin--</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        @error('kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="number" class="form-control @error('telepon') is-invalid @enderror" placeholder="No Telepon" name="telepon" value="{{old('telepon')}}">
                        @error('telepon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control @error('level') is-invalid @enderror">
                            <option value="">--Level--</option>
                            <option value="anggota">Anggota</option>
                            <option value="mitra">Mitra</option>
                            <option value="user">Member</option>
                        </select>
                        @error('level') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Jenis Simpanan</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Simpanan Pokok</label>
                        <input type="number" class="form-control @error('simpanan_pokok') is-invalid @enderror" name="simpanan_pokok" value="20000" readonly>
                        @error('simpanan_pokok') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Simpanan Wajib</label>
                        <input type="number" class="form-control @error('simpanan_wajib') is-invalid @enderror" name="simpanan_wajib" value="30000" readonly>
                        @error('simpanan_wajib') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Simpanan Sukarela</label>
                        <input type="number" class="form-control @error('simpanan_sukarela') is-invalid @enderror" name="simpanan_sukarela" placeholder="30000" value="{{old('simpanan_sukarela')}}">
                        @error('simpanan_sukarela') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Voucher JIMPay</label>
                        <input type="number" class="form-control @error('voucher_jim') is-invalid @enderror" name="voucher_jim" value="10000" readonly>
                        @error('voucher_jim') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>No Anggota</label>
                        <input type="text" class="form-control @error('no_anggota') is-invalid @enderror" name="no_anggota" placeholder="No Anggota" value="JIM">
                        @error('no_anggota') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('users.index')}}" class="btn btn-default">
                    Batal
                </a>
            </div>
        </div>
    </div>


    @stop