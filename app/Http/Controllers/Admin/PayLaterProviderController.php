<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PayLaterProvider;
use Illuminate\Http\Request;

class PayLaterProviderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:paylater-provider-list|paylater-provider-create|paylater-provider-edit|paylater-provider-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:paylater-provider-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:paylater-provider-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:paylater-provider-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $paylaterProvider = PayLaterProvider::all();

        return view('admin.paylater-provider.index', compact('paylaterProvider'));
    }

    public function create()
    {
        return view('admin.paylater-provider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string'
        ]);

        PayLaterProvider::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('paylater-provider.index')
            ->with('success_message', 'Berhasil menambah provider baru');
    }
}
