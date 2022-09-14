<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('anggota.password.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('anggota.password.edit');
    }
}
