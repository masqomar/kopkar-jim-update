<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembiayaanAnggota extends Model
{
    use HasFactory;

    protected $table = 'tr_pembiayaan_anggota';
    public $timestamps = false;

    protected $fillable = [
        'kode_pembiayaan',
        'user_id',
        'setor_bayar',
        'keterangan_setor',
        'tgl_bayar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
