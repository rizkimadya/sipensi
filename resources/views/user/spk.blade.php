@extends('layoutUser.app', ['title' => 'SPK'])

@section('contentUser')
    <div class="container mt-md-5 mt-3 spk">
        <div class="row">
            <div class="col-12 mb-5">
                <p class="fs-4 fw-semibold">Dapatkan Villa Yang Sesuai</p>
                <p>Form Sistem Pendukung Keputusan</p>
            </div>

            <div class="col-12">
                <form id="spk-form" action="{{ route('spk') }}#hasil" method="POST">
                    @csrf
                    <!-- Kategori Harga -->
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="harga">Harga Tarif Sewa Villa</label>
                            <select id="harga" name="harga" class="form-select" required>
                                <option value="">Pilih Kategori Harga</option>
                                <option value="1">Kategori 1 (800.000 - 1.000,000)</option>
                                <option value="2">Kategori 2 (1.100,000 - 1.300.000,00)</option>
                                <option value="3">Kategori 3 (1.400.000,00 - 1.500.000,00)</option>

                            </select>
                        </div>

                        <!-- Jumlah Kamar Tidur -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="kamar_tidur">Jumlah Kamar Tidur</label>
                            <select id="kamar_tidur" name="kamar_tidur" class="form-select" required>
                                <option value="">Pilih Kategori Jumlah Kamar</option>
                                <option value="1">Kategori 1 (1 Kamar)</option>
                                <option value="2">Kategori 2 (2 Kamar)</option>
                                <option value="3">Kategori 3 (3 Kamar)</option>
                            </select>
                        </div>

                        <!-- Daya Tampung -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="daya_tampung">Daya Tampung</label>
                            <select id="daya_tampung" name="daya_tampung" class="form-select" required>
                                <option value="">Pilih Kategori Daya Tampung</option>
                                <option value="1">Kategori 1 (8 Orang)</option>
                                <option value="2">Kategori 2 (10 Orang)</option>
                                <option value="3">Kategori 3 (15 Orang)</option>
                            </select>
                        </div>

                        <!-- Jumlah WC -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="jumlah_wc">Jumlah WC</label>
                            <select id="jumlah_wc" name="jumlah_wc" class="form-select" required>
                                <option value="">Pilih Kategori Jumlah WC</option>
                                <option value="1">Kategori 1 (1 WC)</option>
                                <option value="2">Kategori 2 (2 WC)</option>
                                <option value="3">Kategori 3 (3 WC)</option>
                                <option value="4">Kategori 4 (4 WC)</option>

                            </select>
                        </div>

                        <!-- Jumlah CCTV -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="jumlah_cctv">Jumlah CCTV</label>
                            <select id="jumlah_cctv" name="jumlah_cctv" class="form-select" required>
                                <option value="">Pilih Kategori Jumlah CCTV</option>
                                <option value="1">Kategori 1 (1 CCTV)</option>
                                <option value="2">Kategori 2 (2 CCTV)</option>
                                <option value="3">Kategori 3 (0 CCTV)</option>
                            </select>
                        </div>

                        <!-- Luas Villa -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="luas">Luas Villa</label>
                            <select id="luas" name="luas" class="form-select" required>
                                <option value="">Pilih Luas Villa</option>
                                @foreach ($villas as $item)
                                    <option value="{{ $loop->iteration }}">Kategori {{ $loop->iteration }}
                                        ({{ $item->luas }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-dark mx-auto fw-bold"
                                style="border-radius: 34px; font-size:14px; padding:12px 36px;">
                                Cari Villa
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if (isset($topVillas))
                <div class="col-12 pt-5 properties" id="hasil">
                    <h4 class="mb-3">Villa Rekomendasi</h4>
                    <div class="row">
                        @foreach ($topVillas as $index => $result)
                            <div class="col-lg-4 mb-4">
                                <div class="item shadow">
                                    <div class="ranking mb-3 mx-auto">
                                        <span class="badge bg-primary">Ranking {{ $index + 1 }}</span>
                                    </div>
                                    <a href="{{ url('/detail-villa/' . $result['villa']->id) }}" class="mb-2">
                                        @php
                                            $images = json_decode($result['villa']->gambar);
                                            $firstImage = is_array($images) && count($images) > 0 ? $images[0] : '';
                                        @endphp
                                        <img src="/{{ $firstImage }}" style="height: 35vh;" alt="Villa Image"
                                            class="img-fluid">
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        @if ($result['villa']->status == 'Tersedia')
                                            <span class="category text-white">{{ $result['villa']->status }}</span>
                                        @else
                                            <span class="category text-white">{{ $result['villa']->status }}</span>
                                        @endif
                                        <h6 class="text-danger">
                                            {{ 'Rp ' . number_format($result['villa']->harga, 0, ',', '.') }}</h6>
                                    </div>
                                    <h4><a
                                            href="{{ url('/detail-villa/' . $result['villa']->id) }}">{{ $result['villa']->nama_villa }}</a>
                                    </h4>
                                    <table style="width: 100%">
                                        <tr>
                                            <td>Kamar Tidur : <span>{{ $result['villa']->kamar_tidur }}</span></td>
                                            <td>Kamar Mandi : <span>{{ $result['villa']->jumlah_wc }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>CCTV : <span>{{ $result['villa']->jumlah_cctv }}</span></td>
                                            <td>Daya Tampung : <span>{{ $result['villa']->daya_tampung }}</span></td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <div class="main-button">
                                        <a href="{{ url('/detail-villa/' . $result['villa']->id) }}">Jadwalkan
                                            Kunjungan</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the URL contains the hash #hasil
            if (window.location.hash === '#hasil') {
                // Scroll to the element with the id #hasil
                document.querySelector('#hasil').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script>
@endsection
