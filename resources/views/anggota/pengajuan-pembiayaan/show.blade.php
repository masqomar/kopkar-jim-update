@extends('layouts.user')

@section ('title')
Detail Pengajuan Pembiayaan
@endsection


@section ('content')
<div class="container">
    <div class="element-heading mt-3">
        <h6>
            <font color="#F4A460"> <strong>Detail Pengajuan Pembiayaan<strong></font>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a class="btn btn-sm btn-warning" href="{{route('anggota.pengajuan-pembiayaan.index')}}" role="button">Kembali</a>
        </h6>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <tbody>
                    @foreach ($detailPengajuan as $detail)
                    <tr>
                        <th scope="col">No Anggota</th>
                        <td>{{ Auth::user()->no_anggota }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Nama Anggota</th>
                        <td>{{ Auth::user()->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Kode Pembiayaan</th>
                        <td>{{ $detail->kode_pembiayaan}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Tanggal Pengajuan</th>
                        <td>{{ $detail->tanggal_pengajuan}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Nama Barang</th>
                        <td>{{ $detail->nama_barang}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Spek Barang</th>
                        <td>{{ $detail->spek_barang}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Catatan</th>
                        <td>{{ $detail->catatan}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Total Bayar</th>
                        <td>@rupiah( $detail->pembiayaanAnggota->jumlah_pembiayaan )</td>
                    </tr>
                    <tr>
                        <th scope="col">Tagihan</th>
                        <td>@rupiah ($detail->pembiayaanAnggota->jumlah_pembiayaan / $detail->pembiayaanAnggota->jangka_waktu) /bulan</td>
                    </tr>
                    <tr>
                        <th scope="col">Durasi</th>
                        <td>{{ $detail->pembiayaanAnggota->jangka_waktu}} bulan</td>
                    </tr>
                    <tr>
                        <th scope="col">Jatuh Tempo</th>
                        <td>{{ $detail->pembiayaanAnggota->tgl_selesai}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Status</th>
                        <td>
                            <div class="badge {{ ($detail->pembiayaanAnggota->status_pembiayaan == 'Lunas') ? 'bg-success' : 'bg-danger' }}">
                                <p class="card-text"> {{ $detail->pembiayaanAnggota->status_pembiayaan}}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Keterangan</th>
                        <td>{{ $detail->pembiayaanAnggota->keterangan}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tgl Bayar</th>
                        <th>Keterangan</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($setoran as $setor)
                    <tr>
                        <td>{{ $setor->tgl_bayar}}</td>
                        <td>{{ $setor->keterangan_setor}}</td>
                        <td>@rupiah( $setor->setor_bayar )</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="2" class="text-center">Total Setoran</th>
                        <td>@rupiah($totalSetoran)</td>
                    </tr>
                    <tr>
                        <th colspan="2" class="bg bg-warning text-center">Kekurangan</th>
                        <td class="bg bg-warning">@rupiah($detail->pembiayaanAnggota->jumlah_pembiayaan - $totalSetoran)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection