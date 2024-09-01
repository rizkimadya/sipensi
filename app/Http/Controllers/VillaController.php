<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class VillaController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName . '_' . time() . '.' . $extension;

            // Simpan file ke direktori storage/app/public/fileCkeditor
            $request->file('upload')->storeAs('public/fileCkeditor', $fileName);

            $url = asset('storage/fileCkeditor/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function index()
    {
        $villa = Villa::where('pemilik_id', Auth::user()->id)->latest()->get();

        return view('pemilik.villa.index', compact('villa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar.*' => 'required|image|mimes:jpg,jpeg,png|max:5000', // Note the 'gambar.*' for multiple images
            'nama_villa' => 'required',
            'harga' => 'required',
            'alamat' => 'required',
            'lokasi' => 'required',
            'status' => 'required',
            'kamar_tidur' => 'required',
            'jumlah_wc' => 'required',
            'jumlah_cctv' => 'required',
            'daya_tampung' => 'required',
            'luas' => 'required',
        ]);

        // Initialize an array to store the image filenames
        $gambarPaths = [];

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $nama_file = time() . "_" . $image->getClientOriginalName();
                // Simpan file ke direktori storage
                $image->storeAs('public/fotoVilla', $nama_file);
                $gambarPaths[] = 'storage/fotoVilla/' . $nama_file;
            }
        }
        $villa = new Villa([
            'gambar' => json_encode($gambarPaths), // Store image paths as JSON
            'pemilik_id' => $request->pemilik_id,
            'nama_villa' => $request->nama_villa,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'lokasi' => $request->lokasi,
            'status' => $request->status,
            'kamar_tidur' => $request->kamar_tidur,
            'jumlah_wc' => $request->jumlah_wc,
            'jumlah_cctv' => $request->jumlah_cctv,
            'daya_tampung' => $request->daya_tampung,
            'luas' => $request->luas,
            'keterangan' => $request->keterangan,
        ]);

        $villa->save();
        Alert::success('Success', 'Berhasil menambah villa');
        return redirect('/admin/villa');
    }


    public function edit($id)
    {
        $villa = Villa::where('id', $id)->firstOrFail();
        $pemilik = User::where('roles', 'pemilik')->latest()->get();

        // dd($villa);
        return view('admin.villa.edit', compact('villa', 'pemilik'));
    }

    public function show($id)
    {
        $villa = Villa::where('id', $id)->firstOrFail();
        $pemilik = User::where('roles', 'pemilik')->latest()->get();

        // dd($villa);
        return view('admin.villa.show', compact('villa', 'pemilik'));
    }

    public function update(Request $request, $id)
    {
        $villa = Villa::findOrFail($id);

        // Mengambil data yang di-inputkan
        $data = $request->all();

        // Mengelola gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar-gambar lama
            $gambarLama = json_decode($villa->gambar, true);

            foreach ($gambarLama as $gambar) {
                // Hapus gambar dari direktori storage
                Storage::delete(str_replace('storage/', 'public/', $gambar));
            }

            // Simpan gambar-gambar yang baru
            $gambarPaths = [];

            foreach ($request->file('gambar') as $image) {
                $nama_file = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = 'public/fotoVilla'; // Sesuaikan dengan direktori storage
                $image->storeAs($tujuan_upload, $nama_file);

                // Simpan path gambar baru
                $gambarPaths[] = 'storage/fotoVilla/' . $nama_file;
            }

            $data['gambar'] = json_encode($gambarPaths);
        }

        if ($data) {
            $villa->update($data);
            Alert::success('Success', 'Berhasil mengupdate data villa');
        } else {
            Alert::error('Gagal', 'Gagal mengupdate data villa');
        }
        return redirect('/admin/villa');
    }

    public function destroy($id)
    {
        $villa = Villa::findOrFail($id);

        // Hapus gambar-gambar terkait
        $gambarPaths = json_decode($villa->gambar, true);

        foreach ($gambarPaths as $gambar) {
            // Hapus gambar dari direktori storage
            Storage::delete(str_replace('storage/', 'public/', $gambar));
        }

        $villa->delete();
        Alert::success('Success', 'Berhasil menghapus data villa');
        return redirect('/admin/villa');
    }
}
