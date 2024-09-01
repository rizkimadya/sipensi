@extends('layoutUser.app', ['title' => 'Riwayat Reservasi'])

@section('contentUser')
    <div class="main-banner mt-5 wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s" style="height: 56.7vh;">
        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
            <div class="container mt-md-5 mt-3 spk">
                <div class="col-12 mb-5">
                    <p class="fs-4 fw-semibold">Riwayat Reservasi</p>
                    <p class="">List Riwayat Reservasi Villa</p>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h6>Transaction</h6>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Villa</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Tanggal Reservasi</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($transaksi as $item)
                                                <tr>
                                                    <td>{{ $item->villa->nama_villa }}</td>
                                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                                    <td>
                                                        @if ($item->status == 'pending')
                                                            <span
                                                                class="badge bg-warning text-dark">{{ $item->status }}</span>
                                                        @elseif ($item->status == 'success')
                                                            <span class="badge bg-success">{{ $item->status }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ $item->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item['created_at'] }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>
                                                        @if ($item->status == 'pending')
                                                            <a href="{{ url('transaksi/' . $item->snap_token) }}"
                                                                class="btn btn-primary">Pay</a>
                                                        @endif
                                                        @if ($item->status == 'success')
                                                            @php
                                                                $nama_villa = $item->villa->nama_villa; // Ganti dengan nama villa yang sesuai
                                                                $harga = number_format($item->price, 0, ',', '.'); // Format harga sesuai kebutuhan
                                                                $whatsapp_number = '+6289505940926'; // Nomor telepon tanpa +
                                                                $message = urlencode(
                                                                    "Saya telah melakukan reservasi dan melakukan pembayaran $nama_villa, dengan harga $harga",
                                                                );
                                                            @endphp

                                                            <a href="https://wa.me/{{ $whatsapp_number }}?text={{ $message }}"
                                                                class="btn btn-primary" target="_blank">
                                                                Hubungi Pemilik
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">no a item</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
