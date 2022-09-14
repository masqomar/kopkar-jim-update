@extends('adminlte::page')

@section('title', 'Data Angsuran Pembiayaan')

@section('content_header')
<h1 class="m-0 text-dark">Data Angsuran Pembiayaan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Pembiayaan</th>
                            <th>Anggota</th>
                            <th>Barang</th>
                            <th>Total Pembiayaan</th>
                            <th>Durasi</th>
                            <th>Selesai</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembiayaan as $key => $cicilan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$cicilan->kode_pembiayaan}}</td>
                            <td>{{$cicilan->nama}}</td>
                            <td>{{$cicilan->nama_barang}}</td>
                            <td>@rupiah($cicilan->jumlah_pembiayaan)</td>
                            <td>{{$cicilan->jangka_waktu}}</td>
                            <td>{{$cicilan->tgl_selesai}}</td>
                            <td>{{$cicilan->keterangan}}</td>
                            <td>
                                @if ($cicilan->status_pembiayaan == 'Belum Lunas')
                                @can('pembiayaan-edit')
                                <a href="{{route('angsuran.show', $cicilan->id)}}" class="btn btn-primary btn-xs">
                                    Bayar
                                </a>
                                @endcan
                                @endif
                                @if ($cicilan->status_pembiayaan == 'Lunas')
                                <a href="{{route('admin.angsuran.detail', $cicilan->id)}}" class="btn btn-info btn-xs">
                                    Detail
                                </a>
                                @endif
                            </td>
                        </tr>
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