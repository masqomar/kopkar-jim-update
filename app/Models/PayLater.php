<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayLater extends Model
{
    use HasFactory;

    protected $table = 'paylater';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'kode_paylater',
        'paylater_provider_id',
        'bank_id',
        'no_rekening',
        'atas_nama',
        'tanggal_pengajuan',
        'status',
        'nominal_paylater',
        'jangka_waktu',
        'tgl_selesai',
        'catatan',
        'bukti_bayar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function paylaterProvider()
    {
        return $this->belongsTo(paylaterProvider::class, 'paylater_provider_id', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
}
