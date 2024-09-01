@extends('layoutUser.app', ['title' => 'Villa'])

@section('contentUser')
    <div class="properties ">
        <div class="container mt-md-5 mt-3 spk">
            <div class="row">
                <div class="col-12 mb-5">
                    <p class="fs-4 fw-semibold">Data Villa</p>
                    <p class="">Dapatkan Villa Terbaik Untuk Keluarga</p>
                </div>

                <div class="row">
                    @foreach ($villa as $item)
                        <div class="col-lg-4">
                            <div class="item shadow">
                                <a href="{{ url('/detail-villa/' . $item->id) }}">
                                    @php
                                        $images = json_decode($item->gambar);
                                        $firstImage = is_array($images) && count($images) > 0 ? $images[0] : '';
                                    @endphp
                                    <img src="/{{ $firstImage }}" alt="Villa Image">

                                </a>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    @if ($item->status == 'Tersedia')
                                        <span class="category text-white">{{ $item->status }}</span>
                                    @else
                                        <span class="category text-white">{{ $item->status }}</span>
                                    @endif
                                    <h6 class="text-danger">{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</h6>
                                </div>
                                <h4><a href="{{ url('/detail-villa/' . $item->id) }}">{{ $item->nama_villa }}</a></h4>
                                <table style="width: 100%">
                                    <tr>
                                        <td>Kamar Tidur : <span>{{ $item->kamar_tidur }}</span></td>
                                        <td>Kamar Mandi : <span>{{ $item->jumlah_wc }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>CCTV : <span>{{ $item->jumlah_cctv }}</span></td>
                                        <td>Daya Tampung : <span>{{ $item->daya_tampung }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Luas Villa : <span>{{ $item->luas }}</span></td>
                                    </tr>
                                </table>
                                <hr>
                                <div class="main-button">
                                    <a href="{{ url('/detail-villa/' . $item->id) }}">Jadwalkan Kunjungan</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
