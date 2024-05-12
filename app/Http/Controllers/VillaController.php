<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;

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

    public function indexAdmin(){
        $villa = null;

        return view('pemilik.villa.index', compact('villa'));
    }

    public function index()
    {
        $villa = null;

        return view('pemilik.villa.index', compact('villa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Villa $villa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Villa $villa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Villa $villa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Villa $villa)
    {
        //
    }
}
