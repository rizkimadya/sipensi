<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $villa = Villa::latest()->take(3)->get();
        return view('user.home', compact('villa'));
    }

    public function villa()
    {
        $villa = Villa::latest()->get();
        return view('user.villa', compact('villa'));
    }

    public function spk()
    {
        return view('user.spk');
    }

    public function detailVilla($id){
        $detail = Villa::findOrFail($id);

        return view('user.detailvilla', compact('detail'));
    }
}
