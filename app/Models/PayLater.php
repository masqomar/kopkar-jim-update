<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayLater extends Model
{
    use HasFactory;

    protected $table = 'pay_later';
    public $timestamps = false;

    protected $fillable = [
        'no_transaksi',
        'user_id',
        'produk_id',
        'vendor',
        'rekening',
        'nominal',
        'tanggal',
        'status',
        'bukti'
    ];
}
