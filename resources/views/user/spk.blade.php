@extends('layoutUser.app', ['title' => 'SPK'])

@section('contentUser')
    <div class="container mt-md-5 mt-3 spk">
        <div class="row">
            <div class="col-12 mb-5">
                <p class="fs-4 fw-semibold">Dapatkan Villa Yang Sesuai</p>
                <p class="">Form Sistem Pendukung Keputusan</p>
            </div>

            <div class="col-12">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama_len">Nama Lengkap</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
