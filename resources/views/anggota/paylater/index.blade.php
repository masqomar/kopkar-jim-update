@extends('layouts.user')

@section ('title')
Pengajuan Paylater
@endsection


@section ('content')
<div class="container">
    <div class="element-heading mt-3">
        <h6>
            <font color="#F4A460"> <strong>Pengajuan Paylater<strong></font>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a class="btn btn-sm btn-warning" href="{{route('home')}}" role="button">Kembali</a>
        </h6>
    </div>

    <br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <a class="btn btn-sm btn-primary" href="{{route('anggota.paylater.create')}}" role="button">Pengajuan Baru</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Provider</th>
                        <th>Kode</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paylaterAll as $paylater)
                    @if($anggotaID == Auth::user()->id)
                    <tr>
                        <td>{{ $paylater->paylater_provider_id}}</td>
                        <td>{{ $paylater->kode_paylater}}</td>
                        <td>@rupiah ($paylater->nominal_paylater)</td>
                        @if ($paylater->status === 'Dibayar')
                        <td>
                            <a class="btn btn-sm btn-info" href="{{route('anggota.paylater.show', $paylater->id)}}" role="button">Detail</a>
                        </td>
                        @endif
                        @if ($paylater->status === 'Diproses')
                        <td>{{ $paylater->status}}</td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection