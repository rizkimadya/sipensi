<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function indexVilla()
    {
        $villa = Villa::latest()->get();
        return view('admin.villa.index', compact('villa'));
    }

    public function indexPemilik()
    {
        $pemilik = User::where('roles', 'pemilik')->latest()->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function indexPenyewa()
    {
        $penyewa = User::where('roles', 'penyewa')->latest()->get();
        return view('admin.penyewa.index', compact('penyewa'));
    }

    public function indexTransaksi()
    {
        $transaksi = DB::table('transaksis') // Ganti dengan nama tabel yang sesuai
            ->join('villas', 'transaksis.villa_id', '=', 'villas.id')
            ->join('users as pemilik', 'villas.pemilik_id', '=', 'pemilik.id') // Join untuk mendapatkan pemilik
            ->join('users as penyewa', 'transaksis.user_id', '=', 'penyewa.id') // Join untuk mendapatkan penyewa
            ->select('transaksis.*', 'villas.nama_villa', 'pemilik.username as pemilik_username', 'penyewa.username as penyewa_username') // Pilih kolom yang diperlukan
            ->latest('transaksis.created_at')
            ->get();

        return view('admin.transaksi.index', compact('transaksi'));
    }
}
