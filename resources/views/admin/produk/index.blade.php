@extends('LayoutAdmin.app', ['title' => 'Produk'])

@section('modal-add')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                    transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
            </svg>
        </span>
        Tambah Produk
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/produk') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="max-height: 66vh; overflow: auto">
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar <i>*pilih banyak gambar</i></label>
                                <input type="file" class="form-control" name="gambar[]" required id="gambar" multiple
                                    accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori Produk</label>
                                <select name="kategori_id" id="kategori_id" class="form-select">
                                    <option>Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk" required
                                    placeholder="Masukkan Nama Produk">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Produk</label>
                                <input type="number" class="form-control" name="harga" id="harga" required
                                    placeholder="Masukkan Harga Produk">
                            </div>
                            <div class="mb-3">
                                <label for="berat" class="form-label">Berat Produk</label>
                                <input type="text" class="form-control" name="berat" id="berat" required
                                    placeholder="Masukkan Berat Produk">
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok Produk</label>
                                <input type="number" class="form-control" name="stok" id="stok" required
                                    placeholder="Masukkan Stok Produk">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_terjual" class="form-label">Jumlah Terjual</label>
                                <input type="number" class="form-control" name="jumlah_terjual" id="jumlah_terjual"
                                    required placeholder="Masukkan Jumlah Terjual">
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating Produk</label>
                                <input type="number" class="form-control" name="rating" id="rating" required
                                    placeholder="Masukkan Rating Produk">
                            </div>
                            <div class="mb-3">
                                <label for="no_wa" class="form-label">Nomor Whatsapp</label>
                                <input type="number" class="form-control" name="no_wa" id="no_wa" required
                                    placeholder="Masukkan Nomor Whatsapp">
                            </div>
                            <div class="mb-3">
                                <label for="link_shopee" class="form-label">Link Shopee</label>
                                <input type="url" class="form-control" name="link_shopee" id="link_shopee" required
                                    placeholder="Masukkan Link Shopee">
                            </div>
                            <div class="mb-3">
                                <label for="link_tokopedia" class="form-label">Link Tiktok Shop</label>
                                <input type="url" class="form-control" name="link_tokopedia" id="link_tokopedia"
                                    required placeholder="Masukkan Link Tiktok Shop">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                                <textarea name="deskripsi" id="editor" style="height: 100px; color:#000;"></textarea>
                            </div>
                        </div>
                        <div class="mt-5 justify-content-center d-flex gap-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
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
                            <th>Gambar</th>
                            <th>Kategori Produk</th>
                            <th>Nama Produk</th>
                            <th>Berat</th>
                            <th>Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @php
                                        $images = json_decode($item->gambar);
                                        if (is_array($images) && count($images) > 0) {
                                            $firstImage = $images[0];
                                        }
                                    @endphp
                                    <img src="/{{ $firstImage }}" alt="img" width="40px">
                                </td>
                                <td>{{ $item->kategori->name }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->berat }}</td>
                                <td>{{ $item->stok }}</td>
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
                                            <a href="/admin/produk/edit/{{ $item->id }}"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="/admin/produk/delete/{{ $item->id }}" class="menu-link px-3"
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
