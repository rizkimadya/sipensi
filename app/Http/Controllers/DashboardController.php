<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard.index');
    }

    public function pemilik()
    {
        return view('pemilik.dashboard.index');
    }
}
