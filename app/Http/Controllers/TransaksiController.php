<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function indexUser()
    {
        $transaksi = Transaksi::with('villa')->where('user_id', Auth::user()->id)->latest()->get();
        return view('user.transaksi.index', compact('transaksi'));
    }

    public function pemilikIndex(){
        $transaksi = null;

        return view('pemilik.transaksi.index');
    }
}
