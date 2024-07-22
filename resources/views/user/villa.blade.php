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
                            <div class="item">
                                <a href="{{ url('/detail-villa/' . $item->id) }}">
                                    @php
                                        $images = json_decode($item->gambar);
                                        $firstImage = is_array($images) && count($images) > 0 ? $images[0] : '';
                                    @endphp
                                    <img src="/{{ $firstImage }}" alt="Villa Image">

                                </a>
                                @if ($item->status == 'Tersedia')
                                    <span class="category text-success">{{ $item->status }}</span>
                                @else
                                    <span class="category text-danger">{{ $item->status }}</span>
                                @endif
                                <h6>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</h6>
                                <h4><a href="{{ url('/detail-villa/' . $item->id) }}">{{ $item->nama_villa }}</a></h4>
                                <ul>
                                    <li>Kamar Tidur: <span>{{ $item->kamar_tidur }}</span></li>
                                    <li>Kamar Mandi: <span>{{ $item->jumlah_wc }}</span></li>
                                    <li>CCTV: <span>{{ $item->jumlah_cctv }}</span></li>
                                    <li>Data Tampung: <span>{{ $item->daya_tampung }}</span></li>
                                </ul>
                                <div class="main-button">
                                    <a href="{{ url('/detail-villa/' . $item->id) }}">Schedule a visit</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
