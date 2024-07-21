@extends('layoutUser.app', ['title' => 'Success Transaction'])

@section('contentUser')
    <div class="main-banner wow fadeIn mt-5" id="top" data-wow-duration="1s" data-wow-delay="0.5s" style="height: 40vh;">
        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <h1 class="text-success">Pembayaran Berhasil</h1>
                            <p class="text-success">Terima kasih telah melakukan pembayaran</p>
                            <a href="{{ url('transaksi') }}" class="btn btn-primary mt-3">Lihat Riwayat Reservasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
