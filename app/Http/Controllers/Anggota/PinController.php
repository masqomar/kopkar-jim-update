<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PinController extends Controller
{
    public function edit()
    {
        return view('anggota.pin.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'pin' => ['required', 'min:6', 'max:6']
        ]);

        $request->user()->update([
            'pin' => Hash::make($request->get('pin'))
        ]);

        return redirect()->route('anggota.pin.edit')
            ->with('success', 'PIN berhasil diupdate');
    }
}
