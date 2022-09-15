@extends('adminlte::page')

@section('title', 'Data Paylater')

@section('content_header')
<h1 class="m-0 text-dark">Data Paylater</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('paylater-create')
                <a href="{{route('paylater-anggota.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Anggota</th>
                            <th>No Anggota</th>
                            <th>Catatan</th>
                            <th>Nominal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paylaterAll as $key => $paylater)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$paylater->kode_paylater}}</td>
                            <td>{{$paylater->user->nama}}</td>
                            <td>{{$paylater->user->no_anggota}}</td>
                            <td>{{$paylater->catatan}}</td>
                            <td>@rupiah($paylater->nominal_paylater)</td>
                            <td>
                                @if ($paylater->status == 'Diproses')
                                @can('paylater-edit')
                                <a href="{{route('paylater-anggota.edit', $paylater)}}" class="btn btn-primary btn-xs">
                                    Proses
                                </a>
                                @endcan
                                @can('paylater-delete')
                                <a href="{{route('paylater-anggota.destroy', $paylater)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                                @endcan
                                @endif
                                @if ($paylater->status == 'Dibayar')
                                <a href="{{route('paylater-anggota.show', $paylater->id)}}" class="btn btn-info btn-xs">
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

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush