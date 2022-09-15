@extends('adminlte::page')

@section('title', 'Detail Paylater')

@section('content_header')
<h1 class="m-0 text-dark">Detail Paylater</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <th scope="col">Kode</th>
                            <td>{{$detailPaylater->kode_paylater}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Nama Anggota</th>
                            <td>{{$detailPaylater->user->nama}}</td>
                        </tr>
                        <tr>
                            <th scope="col">No Anggota</th>
                            <td>{{$detailPaylater->user->no_anggota}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Nominal</th>
                            <td>@rupiah($detailPaylater->nominal_paylater)</td>
                        </tr>
                        <tr>
                            <th scope="col">Provider</th>
                            <td>{{$detailPaylater->paylaterProvider->nama}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Bank</th>
                            <td>{{$detailPaylater->bank->kode_bank}} || {{$detailPaylater->bank->nama_bank}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Tanggal Pengajuan</th>
                            <td>{{$detailPaylater->tanggal_pengajuan}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Keterangan</th>
                            <td>{{$detailPaylater->catatan}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Status</th>
                            <td>{{$detailPaylater->status}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Bukti Transfer</th>
                            <td>
                                <img src="{{ asset('/images/bukti_transfer/'.$detailPaylater->bukti_bayar) }}" class="rounded" style="width: 150px">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop