<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Villa;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function indexVilla(){
        $villa = Villa::latest()->get();
        return view('admin.villa.index', compact('villa'));
    }

    public function indexPemilik(){
        $pemilik = User::where('roles', 'pemilik')->latest()->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function indexPenyewa(){
        $penyewa = User::where('roles', 'user')->latest()->get();
        return view('admin.penyewa.index', compact('penyewa'));
    }

    public function indexTransaksi(){
        $transaksi = null;
        return view('admin.transaksi.index', compact('transaksi'));
    }
}
