@extends('layoutUser.app', ['title' => 'Home'])

@section('contentUser')
    <div class="main-banner" style="height: 165px">
        <div class="owl-carousel owl-banner">
            <div class="position-relative">
                <div class="item item-1">
                </div>
                <div class="header-text position-absolute pt-5 text-center" style="z-index: 1; top: 0; width: 100%">
                    <h3 class="text-white">Pilihan Villa</h3>
                    <h2 class="text-white">Dapatkan Villa Terbaik Untuk Keluarga</h2>
                </div>
            </div>
            <div class="position-relative">
                <div class="item item-2">
                </div>
                <div class="header-text position-absolute pt-5 text-center" style="z-index: 1; top: 0; width: 100%">
                    <h3 class="text-white">Pilihan Villa</h3>
                    <h2 class="text-white">Dapatkan Villa Terbaik Untuk Keluarga</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="properties section">
        <div class="container">
            <div class="row">
                @foreach ($villa as $item)
                    <div class="col-lg-4">
                        <div class="item ">
                            <a href="{{ url('/detail-villa/' . $item->id) }}">
                                @php
                                    $images = json_decode($item->gambar);
                                    $firstImage = is_array($images) && count($images) > 0 ? $images[0] : '';
                                @endphp
                                <img src="/{{ $firstImage }}" style="height: 35vh;" alt="Villa Image">

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
                {{-- <div class="col-12 d-flex">
                    <a href="{{ url('/villa') }}" class="btn btn-dark mx-auto fw-blod"
                        style="border-radius: 34px; font-size:14px; padding:12px 36px;">Lihat Semua Villa</a>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="contact section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6 class="text-white">| Contact Us |</h6>
                        <h2>Get In Touch With Our Agents</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div id="map">
                        <iframe style="border-radius: 12px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127138.68907410304!2d119.76433005295858!3d-5.249483627317817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbe9597ff0a8e85%3A0x630fdc8256228cf0!2sKec.%20Tinggimoncong%2C%20Kabupaten%20Gowa%2C%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1720059498898!5m2!1sid!2sid"
                            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="item phone me-0">
                                <img src="assets/images/phone-icon.png" alt="" style="max-width: 42px;">
                                <h6 style="font-size: 15px">088245906437<br><span>Phone Number</span></h6>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="item email">
                                <img src="assets/images/email-icon.png" alt="" style="max-width: 42px;">
                                <h6 style="font-size: 15px">villabukitlereng@gmail.com<br><span>Business Email</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <form id="contact-form" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="name">Full Name</label>
                                    <input type="name" name="name" id="name" placeholder="Your Name..."
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Your E-mail..." required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="subject">Subject</label>
                                    <input type="subject" name="subject" id="subject" placeholder="Subject..."
                                        autocomplete="on">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Send
                                        Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
