<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function indexUser()
    {
        $transaksi = Transaksi::with('villa')->where('user_id', Auth::user()->id)->latest()->get();
        return view('user.transaksi.index', compact('transaksi'));
    }

    public function pemilikIndex()
    {
        $pemilik_id = Auth::user()->id;
        $villa_ids = Villa::where('pemilik_id', $pemilik_id)->pluck('id');

        // Ambil data transaksi milik pemilik dengan relasi ke villa
        $transaksi = Transaksi::whereIn('villa_id', $villa_ids)
            ->latest()
            ->get();
        // dd($transaksi);
        // Kirim data transaksi ke view
        return view('pemilik.transaksi.index', compact('transaksi'));
    }
}
