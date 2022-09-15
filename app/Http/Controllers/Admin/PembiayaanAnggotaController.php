<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PembiayaanAnggota;
use App\Models\PengajuanPembiayaan;
use App\Models\TransaksiPembiayaanAnggota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembiayaanAnggotaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pembiayaan-list|pembiayaan-create|pembiayaan-edit|pembiayaan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:pembiayaan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pembiayaan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pembiayaan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $pembiayaanAjukan = PengajuanPembiayaan::all();

        // dd($pengajuanAll);
        return view('admin.pembiayaan.index', compact('pembiayaanAjukan'));
    }

    public function show($id)
    {
        $pengajuanID = PengajuanPembiayaan::where('id', $id)->get();
        $kode_pembiayaan = PengajuanPembiayaan::select('kode_pembiayaan')->where('id', $id)->get()->first()->kode_pembiayaan;
        $pembiayaanAnggotaID = TransaksiPembiayaanAnggota::where('kode_pembiayaan', $kode_pembiayaan)->get();

        // dd($pembiayaanAnggotaID);
        return view('admin.pembiayaan.show', compact('pengajuanID', 'pembiayaanAnggotaID'));
    }

    public function edit($id)
    {
        $pembiayaanID = PengajuanPembiayaan::findOrFail($id);

        return view('admin.pembiayaan.edit', compact('pembiayaanID'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pembiayaan' => 'required|string',
            'nama_barang' => 'required|string',
            'spek_barang' => 'nullable|string',
            'jumlah_pembiayaan' => 'required|numeric',
            'jangka_waktu' => 'required|numeric'
        ]);

        $tgl_pembiayaan = Carbon::now();
        $tgl_selesai = Carbon::now()->addMonths($request->jangka_waktu);

        DB::transaction(
            function () use ($request, $tgl_pembiayaan, $tgl_selesai, $id) {

                PembiayaanAnggota::create([
                    'kode_pembiayaan' => $request->kode_pembiayaan,
                    'jumlah_pembiayaan' => $request->jumlah_pembiayaan,
                    'jangka_waktu' => $request->jangka_waktu,
                    'tgl_pembiayaan' => $tgl_pembiayaan,
                    'tgl_selesai' => $tgl_selesai,
                    'status_pembiayaan' => 'Belum Lunas',
                ]);

                PengajuanPembiayaan::where('id', $id)
                    ->update([
                        'nama_barang' => $request->nama_barang,
                        'spek_barang' => $request->spek_barang,
                        'status_pengajuan' => 'Disetujui'
                    ]);
            }
        );

        // dd($inserten);
        return redirect()->route('pembiayaan.index')
            ->with('success_message', 'Berhasil memproses pembiayaan baru');
    }
}
