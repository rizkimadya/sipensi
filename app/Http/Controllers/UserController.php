<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function properties()
    {
        return view('user.properties');
    }

    public function detailProperties()
    {
        return view('user.details');
    }

    public function contact()
    {
        return view('user.contact');
    }
}
