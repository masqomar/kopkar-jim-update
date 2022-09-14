@extends('adminlte::page')

@section('title', 'Detail Pembiayaan')

@section('content_header')
@foreach($pengajuanID as $key => $pengajuan)
<h1 class="m-0 text-dark">Detail Pembiayaan
    <div class="text-green">{{ $pengajuan->user->nama }} || {{ $pengajuan->user->no_anggota }}</div>
</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <th scope="col">Kode Pembiayaan</th>
                            <td>{{ $pengajuan->kode_pembiayaan }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <td>{{ $pengajuan->nama_barang }} || {{ $pengajuan->spek_barang }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Catatan</th>
                            <td>{{ $pengajuan->catatan }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Tanggal Pengajuan</th>
                            <td>{{ $pengajuan->tanggal_pengajuan }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Status</th>
                            <td>{{ $pengajuan->status_pengajuan }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Nominal Pembiayaan</th>
                            <td>@rupiah($pengajuan->pembiayaanAnggota->jumlah_pembiayaan)</td>
                        </tr>
                        <tr>
                            <th scope="col">Nominal Pembiayaan</th>
                            <td>{{$pengajuan->pembiayaanAnggota->tgl_pembiayaan}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Nominal Pembiayaan</th>
                            <td>{{$pengajuan->pembiayaanAnggota->tgl_pembiayaan}}</td>
                        </tr>


                        <td>{{$pengajuan->pembiayaanAnggota->jangka_waktu}}</td>
                        <td>{{$pengajuan->pembiayaanAnggota->bayar_perbulan}}</td>
                        <td>{{$pengajuan->pembiayaanAnggota->total_bayar}}</td>
                        <td>{{$pengajuan->pembiayaanAnggota->tgl_selesai}}</td>
                        <td>{{$pengajuan->pembiayaanAnggota->status_pembiayaan}}</td>
                        <td>{{$pengajuan->pembiayaanAnggota->keterangan}}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop


@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });
</script>
@endpush