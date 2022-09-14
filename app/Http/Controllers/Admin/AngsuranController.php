<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PembiayaanAnggota;
use App\Models\PengajuanPembiayaan;
use App\Models\ProdukKoperasi;
use App\Models\TransaksiPembiayaanAnggota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AngsuranController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:angsuran-list|angsuran-create|angsuran-edit|angsuran-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:angsuran-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:angsuran-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:angsuran-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $pembiayaan = DB::table('pembiayaan_ajukan')
            ->join('users', 'pembiayaan_ajukan.user_id', '=', 'users.id')
            ->join('pembiayaan_anggota', 'pembiayaan_anggota.kode_pembiayaan', '=', 'pembiayaan_ajukan.kode_pembiayaan')
            ->select('pembiayaan_anggota.*', 'pembiayaan_ajukan.nama_barang', 'pembiayaan_ajukan.status_pengajuan', 'users.nama')
            ->where('pembiayaan_ajukan.status_pengajuan', 'Disetujui')
            ->get();

        return view('admin.angsuran.index', compact('pembiayaan'));
    }

    public function show($id)
    {
        $pembiayaanID = PembiayaanAnggota::where('id', $id)->get()->first();
        $pembiayaan = DB::table('pembiayaan_ajukan')
            ->join('users', 'pembiayaan_ajukan.user_id', '=', 'users.id')
            ->select('users.nama', 'users.id', 'pembiayaan_ajukan.nama_barang')
            ->where('kode_pembiayaan', $pembiayaanID->kode_pembiayaan)
            ->get()->first();

        $cicilan = TransaksiPembiayaanAnggota::where('kode_pembiayaan', $pembiayaanID->kode_pembiayaan)->groupBy('kode_pembiayaan')->sum('setor_bayar');

        // dd($cicilan);
        return view('admin.angsuran.show', compact('pembiayaanID', 'pembiayaan', 'cicilan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pembiayaan' => 'required|string',
            'user_id' => 'required|numeric',
            'setor_bayar' => 'required|numeric',
            'keterangan_setor' => 'required|string|max:255',
            'pelunasan' => 'required|string|max:255'
        ]);

        $pelunasan = $request->pelunasan;

        TransaksiPembiayaanAnggota::create([
            'kode_pembiayaan' => $request->kode_pembiayaan,
            'user_id' => $request->user_id,
            'setor_bayar' => $request->setor_bayar,
            'keterangan_setor' => $request->keterangan_setor,
            'tgl_bayar' => Carbon::now()
        ]);

        PembiayaanAnggota::where('kode_pembiayaan', $request->kode_pembiayaan)
            ->update([
                'status_pembiayaan' => $pelunasan
            ]);

        return redirect()->route('angsuran.index')
            ->with('success_message', 'Berhasil menambahkan angsuran baru');
    }

    public function detail($id)
    {
        return view('admin.angsuran.detail');
    }
}
