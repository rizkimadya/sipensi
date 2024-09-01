@extends('layoutUser.app', ['title' => 'Details Properties'])

@section('contentUser')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="breadcrumb" style="border-radius: 8px;">
                        <h4>{{ $detail->nama_villa }}</h4>
                        @if ($detail->status == 'Tersedia')
                            <p class="text-success fw-bolder">Tersedia</p>
                        @else
                            <p class="text-danger fw-bolder">Terisi</p>
                        @endif
                    </span>
                    <h3>{{ 'Rp ' . number_format($detail->harga, 0, ',', '.') }} / Hari</h3>
                    @if ($detail->status == 'Tersedia')
                        <div class="mt-4">
                            <!-- Button trigger modal -->
                            @if (auth()->check())
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Reservasi Villa
                                </button>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">Reservasi Villa</a>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Tanggal Reservasi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/checkout') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id"
                                                    value="{{ auth()->check() ? auth()->user()->id : '' }}">
                                                <input type="hidden" name="villa_id" value="{{ $detail->id }}">
                                                <input type="hidden" name="status" value="pending">
                                                <input type="hidden" name="price" value="{{ $detail->harga }}">
                                                <input type="date" name="tanggal" class="form-control">
                                                <hr>
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-success" type="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mt-4">
                            <button disabled class="btn btn-danger px-4" type="submit">Villa Terisi</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="single-property section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @php
                        $images = json_decode($detail->gambar);
                        if (is_array($images) && count($images) > 0) {
                            $firstImage = $images[0];
                        }
                    @endphp

                    <div class="main-image">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide">
                            <div class="carousel-indicators">
                                @foreach ($images as $index => $image)
                                    <button type="button" data-bs-target="#carouselExampleDark"
                                        data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"
                                        aria-current="{{ $index == 0 ? 'true' : '' }}"
                                        aria-label="Slide {{ $index + 1 }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach ($images as $index => $image)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="10000">
                                        <img src="/{{ $image }}" class="d-block w-100 rounded"
                                            alt="Slide {{ $index + 1 }}">
                                        <div class="carousel-caption d-none d-md-block">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <div class="main-content">
                        <h4>Fasilitas</h4>
                        {!! $detail->keterangan !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-table">
                        <ul>
                            <li>
                                <a href="{{ $detail->lokasi }}" class="btn w-100" style="background:#E3B697; color:#fff;"
                                    target="_blank">Lihat Lokasi</a>
                            </li>
                            <li>
                                <h4>{{ $detail->kamar_tidur }}<br><span>Kamar Tidur</span></h4>
                            </li>
                            <li>
                                <h4>{{ $detail->jumlah_wc }}<br><span>Kamar Mandi</span></h4>
                            </li>
                            <li>
                                <h4>{{ $detail->jumlah_cctv }}<br><span>CCTV</span></h4>
                            </li>
                            <li>
                                <h4>{{ $detail->daya_tampung }} Orang<br><span>Daya Tampung</span></h4>
                            </li>
                            <li>
                                <h4>{{ $detail->luas }}<br><span>Luas Villa</span></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
