<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function regis()
    {
        return view('auth.regis');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = auth()->user();

            if ($user->roles == 'admin') {
                Alert::success('Berhasil Login', 'Selamat Datang Admin');
                return redirect('/dashboard-admin');
            } elseif ($user->roles == 'user') {
                Alert::success('Berhasil Login', 'Selamat Datang ' . $user->username);
                return redirect('/dashboard-user');
            } else {
                return back()->withErrors([
                    'status' => 'Akun anda tidak tervalidasi',
                ]);
            }
        }

        return back()->withErrors([
            'password' => 'Username atau password Anda salah',
        ]);
    }

    public function postRegis(Request $request)
    {
        // Validasi input form
        $validator = Validator::make($request->all(), [
            'roles' => 'required', // sesuaikan aturan validasi sesuai kebutuhan
            'nama_lengkap' => 'required',
            'no_wa' => 'required|unique:users', // unique:users menandakan field harus unik di tabel users
            'username' => 'required|unique:users',
            'password' => 'required|min:3',
            'alamat' => 'required',
        ]);

        // Jika validasi gagal, kembalikan response dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Validasi berhasil, simpan data pengguna baru ke dalam database
        $user = new User();
        $user->roles = $request->roles;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->no_wa = $request->no_wa;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->alamat = $request->alamat;

        $user->save();

        // Tampilkan pesan sukses menggunakan package SweetAlert
        Alert::success('Berhasil Mendaftar', 'Silahkan Login');

        // Redirect ke halaman login
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
