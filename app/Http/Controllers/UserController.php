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

    public function detailVilla($id)
    {
        $detail = Villa::findOrFail($id);

        return view('user.detailvilla', compact('detail'));
    }

    public function spkForm()
    {
        return view('user.spk');
    }

    public function spk(Request $request)
    {
        // Validasi input
        $request->validate([
            'harga' => 'required|numeric|min:1|max:5',
            'kamar_tidur' => 'required|numeric|min:1|max:5',
            'daya_tampung' => 'required|numeric|min:1|max:5',
            'jumlah_wc' => 'required|numeric|min:1|max:5',
        ]);

        // Bobot
        $bobot = [
            'harga' => 0.30,
            'kamar_tidur' => 0.25,
            'daya_tampung' => 0.25,
            'jumlah_wc' => 0.20,
        ];

        // Ambil data dari form
        $inputData = $request->only([
            'harga',
            'kamar_tidur',
            'daya_tampung',
            'jumlah_wc'
        ]);

        // Ambil semua villa
        $villas = Villa::all();
        $results = [];

        foreach ($villas as $villa) {
            $dataVilla = [
                'harga' => $villa->harga,
                'kamar_tidur' => $villa->kamar_tidur,
                'daya_tampung' => $villa->daya_tampung,
                'jumlah_wc' => $villa->jumlah_wc,
            ];

            // Normalisasi nilai dan hitung nilai akhir
            $nilaiAkhir = 0;
            foreach ($inputData as $key => $value) {
                if ($key === 'harga') {
                    // Kriteria cost: normalisasi dengan metode invers (nilai minimum yang diinginkan)
                    $minValue = Villa::min($key);
                    $normalized = $minValue / $dataVilla[$key];
                } else {
                    // Kriteria benefit: normalisasi dengan metode biasa (nilai maksimum yang diinginkan)
                    $maxValue = Villa::max($key);
                    $normalized = $dataVilla[$key] / $maxValue;
                }

                // Hitung nilai akhir
                $nilaiAkhir += $normalized * $bobot[$key];
            }

            $results[] = [
                'villa' => $villa,
                'nilaiAkhir' => $nilaiAkhir
            ];
        }

        // Urutkan hasil berdasarkan nilai akhir dan ambil 3 teratas
        usort($results, function ($a, $b) {
            return $b['nilaiAkhir'] <=> $a['nilaiAkhir'];
        });

        $topVillas = array_slice($results, 0, 3);

        return view('user.spk', [
            'topVillas' => $topVillas
        ]);
    }
}
