<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function indexVilla(){
        $villa = null;
        return view('admin.villa.index', compact('villa'));
    }

    public function indexPemilik(){
        $pemilik = null;
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function indexPenyewa(){
        $penyewa = null;
        return view('admin.penyewa.index', compact('penyewa'));
    }

    public function indexTransaksi(){
        $transaksi = null;
        return view('admin.transaksi.index', compact('transaksi'));
    }
}
