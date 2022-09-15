<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayLaterProvider extends Model
{
    use HasFactory;

    protected $table = 'paylater_provider';
    public $timestamps = false;

    protected $fillable = [
        'nama'
    ];
}
