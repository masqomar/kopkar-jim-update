<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:anggota-menu');
    }

    public function index()
    {
        return view('anggota.profile.index');
    }
}
