@extends('layoutAdmin.app', ['title' => 'Villa'])

@section('modal-button')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                    transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
            </svg>
        </span>
        Tambah Villa
    </button>
@endsection

@section('modal')
    @php
        use App\Models\User; // Import model User

        // Ambil data pemilik
        $pemilik = User::where('roles', 'pemilik')->latest()->get();
    @endphp
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Villa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/admin/villa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div style="max-height: 70vh; overflow: auto">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="pemilik_id" class="form-label">Pilih Pemilik</label>
                                        <select name="pemilik_id" id="pemilik_id" name="pemilik_id" class="form-select">
                                            <option value="" selected disabled>Pilih Pemilik</option>
                                            @foreach ($pemilik as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar <i>*pilih banyak gambar</i></label>
                                        <input type="file" class="form-control" name="gambar[]" required id="gambar"
                                            multiple accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_villa" class="form-label">Nama Villa</label>
                                        <input type="text" class="form-control" name="nama_villa" id="nama_villa"
                                            required placeholder="Masukkan Nama Villa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga Sewa Villa</label>
                                        <input type="number" class="form-control" name="harga" id="harga" required
                                            placeholder="Masukkan Harga Sewa Villa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Villa</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" required
                                            placeholder="Masukkan Alamat Villa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lokasi" class="form-label">Link Maps Lokasi Villa</label>
                                        <input type="link" class="form-control" name="lokasi" id="lokasi" required
                                            placeholder="Masukkan Link Maps Lokasi Villa">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="" selected disabled>Pilih Status</option>
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Terisi">Terisi</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kamar_tidur" class="form-label">Jumlah Kamar Tidur</label>
                                        <input type="number" class="form-control" name="kamar_tidur" id="kamar_tidur"
                                            required placeholder="Masukkan Jumlah Kamar Tidur" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_wc" class="form-label">Jumlah Kamar Mandi/Toilet</label>
                                        <input type="number" class="form-control" name="jumlah_wc" id="jumlah_wc"
                                            required placeholder="Masukkan Jumlah Kamar Mandi/Toilet" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_cctv" class="form-label">Jumlah CCTV</label>
                                        <input type="number" class="form-control" name="jumlah_cctv" id="jumlah_cctv"
                                            required placeholder="Masukkan Jumlah CCTV" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label for="daya_tampung" class="form-label">Jumlah Daya Tampung</label>
                                        <input type="number" class="form-control" name="daya_tampung" id="daya_tampung"
                                            required placeholder="Masukkan Jumlah Daya Tampung" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label for="luas" class="form-label">Luas Villa</label>
                                        <input type="text" class="form-control" name="luas" id="luas"
                                            required placeholder="Masukkan Luas Villa">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="editor" style="height: 100px; color:#000;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center d-flex gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card table-responsive p-md-4 p-2">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username Pemilik</th>
                            <th>Whatsapp</th>
                            <th>Gambar</th>
                            <th>Nama Villa</th>
                            <th>Harga</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($villa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pemilik->username }}</td>
                                <td>{{ $item->pemilik->no_wa }}</td>
                                <td>
                                    @php
                                        $images = json_decode($item->gambar);
                                        if (is_array($images) && count($images) > 0) {
                                            $firstImage = $images[0];
                                        }
                                    @endphp
                                    <img src="/{{ $firstImage }}" alt="img" width="40px">
                                </td>
                                <td>{{ $item->nama_villa }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->alamat }}</td>
                                @if ($item->status == 'Tersedia')
                                    <td class="fw-bold text-success">{{ $item->status }}</td>
                                @else
                                    <td class="fw-bold text-danger">{{ $item->status }}</td>
                                @endif
                                <td class="text-end pe-3">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="/admin/villa/show/{{ $item->id }}"
                                                class="menu-link px-3">Lihat</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="/admin/villa/edit/{{ $item->id }}"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="/admin/villa/delete/{{ $item->id }}" class="menu-link px-3"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                                Delete
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
