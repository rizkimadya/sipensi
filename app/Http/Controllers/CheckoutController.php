<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'villa_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->price,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'username' => Auth::user()->username,
            ),
            'expiry' => array(
                'start_time' => date("Y-m-d H:i:s O"), // waktu mulai transaksi
                'unit' => 'day', // Mengatur unit ke 'day'
                'duration' => 60 // Mengatur durasi yang panjang, misalnya 60 hari
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $checkout = new Transaksi();
        $checkout->user_id = $request->user_id;
        $checkout->villa_id = $request->villa_id;
        $checkout->price = $request->price;
        $checkout->snap_token = $snapToken;
        $checkout->status = $request->status;

        $checkout->save();

        Alert::success('Success', 'Reservasi Success, Silahkan Lakukan Pembayaran');
        return redirect('/transaksi');
    }

    public function detailCheckout($snapToken)
    {
        $checkout = Transaksi::where('snap_token', $snapToken)->first();
        return view('user.transaksi.detail', compact('checkout'));
    }

    public function successPay(Transaksi $transaction)
    {
        $transaction->status = 'success';
        $transaction->save();

        return view('user.transaksi.success');
    }
}
