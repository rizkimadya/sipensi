<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'villa_id',
        'price',
        'status',
        'snap_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function villa()
    {
        return $this->belongsTo(Villa::class, 'villa_id');
    }
}
