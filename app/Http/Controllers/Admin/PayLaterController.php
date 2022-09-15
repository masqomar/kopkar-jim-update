<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PayLater;
use Illuminate\Http\Request;

class PayLaterController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:paylater-list|paylater-create|paylater-edit|paylater-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:paylater-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:paylater-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:paylater-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $paylaterAll = PayLater::all();

        return view('admin.paylater-anggota.index', compact('paylaterAll'));
    }

    public function edit($id)
    {
        $paylaterID = PayLater::findOrFail($id);

        return view('admin.paylater-anggota.edit', compact('paylaterID'));
    }

    public function show($id)
    {
        $detailPaylater = PayLater::findOrFail($id);

        return view('admin.paylater-anggota.show', compact('detailPaylater'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $bukti_bayar = time() . '.' . $request->bukti_bayar->hashName();
        $request->bukti_bayar->move(public_path('images/bukti_transfer'), $bukti_bayar);

        PayLater::where('id', $id)
            ->update([
                'bukti_bayar' => $bukti_bayar,
                'status' => 'Dibayar'
            ]);

        return redirect()->route('paylater-anggota.index')
            ->with('success_message', 'Berhasil membayar paylater anggota');
    }
}
