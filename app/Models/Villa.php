<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemilik_id',
        "gambar",
        "nama_villa",
        "harga",
        "alamat",
        "lokasi",
        "status",
        "kamar_tidur",
        "jumlah_wc",
        "jumlah_cctv",
        "daya_tampung",
        "keterangan",
    ];

    public function pemilik()
    {
        return $this->belongsTo(User::class, 'pemilik_id');
    }
}
