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
        $villas = Villa::all();
        return view('user.spk', compact('villas'));
    }

    public function spk(Request $request)
    {
        // Validasi input
        $request->validate([
            'harga' => 'required|numeric|min:1|max:5',
            'kamar_tidur' => 'required|numeric|min:1|max:5',
            'daya_tampung' => 'required|numeric|min:1|max:5',
            'jumlah_wc' => 'required|numeric|min:1|max:5',
            'luas' => 'required|string', // Validasi sebagai string karena luas memiliki format spesifik
        ]);

        // Bobot
        $bobot = [
            'harga' => 0.30,
            'kamar_tidur' => 0.25,
            'daya_tampung' => 0.25,
            'jumlah_wc' => 0.20,
            'luas' => 0.20,
        ];

        // Ambil data dari form
        $inputData = $request->only([
            'harga',
            'kamar_tidur',
            'daya_tampung',
            'jumlah_wc',
            'luas'
        ]);

        // Ambil semua villa
        $villas = Villa::all();
        $results = [];

        foreach ($villas as $villa) {
            // Pastikan nilai villa adalah numerik atau diparsing dengan benar
            $dataVilla = [
                'harga' => is_numeric($villa->harga) ? (int)$villa->harga : 0,
                'kamar_tidur' => is_numeric($villa->kamar_tidur) ? (int)$villa->kamar_tidur : 0,
                'daya_tampung' => is_numeric($villa->daya_tampung) ? (int)$villa->daya_tampung : 0,
                'jumlah_wc' => is_numeric($villa->jumlah_wc) ? (int)$villa->jumlah_wc : 0,
                'luas' => $this->parseLuas($villa->luas), // Panggil fungsi untuk parsing nilai luas
            ];

            // Cek jika ada nilai non-numerik sebelum perhitungan
            foreach ($dataVilla as $key => $value) {
                if (!is_numeric($value)) {
                    $dataVilla[$key] = 0; // Set ke 0 jika tidak valid
                }
            }

            // Debugging: Cek nilai-nilai sebelum perhitungan
            // dd($dataVilla);

            // Normalisasi nilai dan hitung nilai akhir
            $nilaiAkhir = 0;
            foreach ($inputData as $key => $value) {
                if ($key === 'harga') {
                    $minValue = Villa::min($key);
                    if (is_numeric($minValue) && $dataVilla[$key] > 0) {
                        $normalized = $minValue / $dataVilla[$key];
                    } else {
                        $normalized = 0;
                    }
                } else {
                    $maxValue = Villa::max($key);
                    if (is_numeric($maxValue) && $maxValue > 0) {
                        $normalized = $dataVilla[$key] / $maxValue;
                    } else {
                        $normalized = 0;
                    }
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
            'topVillas' => $topVillas,
            'villas' => $villas
        ]);
    }

    /**
     * Fungsi untuk parsing nilai luas
     */
    private function parseLuas($luas)
    {
        // Cek apakah format luas mengandung "x"
        if (preg_match('/(\d+)\s*x\s*(\d+)/', $luas, $matches)) {
            // Kalkulasi luas sebagai panjang x lebar
            return (int)$matches[1] * (int)$matches[2];
        }

        // Jika luas tidak dalam format "300 x 150", kembalikan 0 atau nilai default lain
        return 0;
    }
}
