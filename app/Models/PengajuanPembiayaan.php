<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPembiayaan extends Model
{
    use HasFactory;
    protected $table = 'pembiayaan_ajukan';

    public $timestamps = false;

    protected $fillable = [
        'kode_pembiayaan',
        'user_id',
        'produk_id',
        'nama_barang',
        'spek_barang',
        'catatan',
        'tanggal_pengajuan',
        'status_pengajuan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function produkKoperasi()
    {
        return $this->belongsTo(ProdukKoperasi::class, 'produk_id', 'id');
    }

    public function pembiayaanAnggota()
    {
        return $this->belongsTo(PembiayaanAnggota::class, 'kode_pembiayaan', 'kode_pembiayaan');
    }

    public function transaksiBayar()
    {
        return $this->belongsTo(TransaksiPembiayaanAnggota::class, 'kode_pembiayaan', 'kode_pembiayaan');
    }
}
