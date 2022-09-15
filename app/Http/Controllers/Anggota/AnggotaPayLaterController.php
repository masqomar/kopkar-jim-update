<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\PayLater;
use App\Models\PayLaterProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AnggotaPayLaterController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:anggota-menu');
    }

    public function index()
    {
        $anggotaID = Auth::user()->id;
        $paylaterAll = PayLater::where('user_id', $anggotaID)->get();

        return view('anggota.paylater.index', compact('anggotaID', 'paylaterAll'));
    }

    public function create()
    {
        $providerID = PayLaterProvider::get();
        $bankID = Bank::get();

        return view('anggota.paylater.create', compact('providerID', 'bankID'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|numeric',
            'bank_id' => 'required|numeric',
            'no_rekening' => 'required|numeric',
            'nominal_paylater' => 'required|numeric',
            'jangka_waktu' => 'required|numeric',
            'atas_nama' => 'required|string',
            'catatan' => 'required|string|max:255',
        ]);

        $tgl_selesai = Carbon::now()->addMonths($request->jangka_waktu);
        $kodePaylater = Str::random(10);

        PayLater::create([
            'user_id' => Auth::user()->id,
            'kode_paylater' => $kodePaylater,
            'paylater_provider_id' => $request->provider_id,
            'bank_id' => $request->bank_id,
            'no_rekening' => $request->no_rekening,
            'atas_nama' => $request->atas_nama,
            'tanggal_pengajuan' => Carbon::now(),
            'nominal_paylater' => $request->nominal_paylater,
            'jangka_waktu' => $request->jangka_waktu,
            'catatan' => $request->catatan,
            'tgl_selesai' => $tgl_selesai
        ]);

        return redirect()->route('anggota.paylater.index')
            ->with('success', 'Berhasil mengajukan paylater');
    }
}
