<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $villa = Villa::count();
        $pemilik = User::where('roles', 'pemilik')->count();
        $penyewa = User::where('roles', 'penyewa')->count();
        $transaksi = Transaksi::where('status', 'success')->count();

        return view('admin.dashboard.index', compact('villa', 'pemilik', 'penyewa', 'transaksi'));
    }

    public function pemilik()
    {
        // Ambil ID pemilik dari user yang sedang login
        $pemilik_id = Auth::user()->id;

        // Ambil jumlah villa berdasarkan pemilik_id
        $villa_count = Villa::where('pemilik_id', $pemilik_id)->count();

        // Ambil ID villa yang dimiliki oleh pemilik
        $villa_ids = Villa::where('pemilik_id', $pemilik_id)->pluck('id');

        // Hitung jumlah transaksi dengan status 'success' yang terkait dengan ID villa milik pemilik
        $transaksi_count = Transaksi::whereIn('villa_id', $villa_ids)
            ->where('status', 'success')
            ->count();

        // Kirim data ke view
        return view('pemilik.dashboard.index', compact('villa_count', 'transaksi_count'));
    }
}
