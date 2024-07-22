@extends('layoutUser.app', ['title' => 'transaksi'])

@section('contentUser')
    <div class="main-banner wow fadeIn mt-5" id="top" data-wow-duration="1s" data-wow-delay="0.5s" style="height: 40vh;">
        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
            <div class="container mt-md-5 mt-3 spk">
                <div class="col-12 mb-5">
                    <p class="fs-4 fw-semibold">Detail Reservasi</p>
                    <p class="">Detail Reservasi Villa</p>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h6 class="mb-2">Transaction Details</h6>
                        <div class="row justify-content-center d-flex">
                            <div class="col-md-12">
                                <div class="card border-0 shadow-sm rounded p-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-md-flex">
                                                <p class="mb-0 me-0 text-dark">Reservasi {{ $checkout->villa->nama_villa }}
                                                </p>
                                                <span class="ms-auto text-warning" style="font-size: 12px;"><i>anda akan
                                                        melakukan pembayaran sekarang</i></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-6">
                                                    <p class="mb-0 me-0 text-dark">Total Price</p>
                                                </div>
                                                <div class="col-md-9 col-6">
                                                    <h6 class="mb-3 me-0">=
                                                        Rp {{ number_format($checkout->price, 0, ',', '.') }}</h6>
                                                </div>
                                            </div>
                                            <button class="btn btn-success btn-sm ms-auto" id="pay-button">Bayar
                                                Sekarang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- ini link midtrans --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $checkout->snap_token }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    window.location.href = '{{ url('/checkout/success/' . $checkout->id) }}'
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endsection
