@extends('LayoutAdmin.app', ['title' => 'Produk'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card table-responsive p-md-4 p-2">
                <form action="/admin/produk/update/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar <i>*pilih banyak gambar</i></label>
                        <input type="file" class="form-control" name="gambar[]" id="gambar" multiple accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">kategori Produk</label>
                        <select name="kategori" id="kategori" class="form-select">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $produk->kategori_id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                            value="{{ $produk->nama_produk }}" placeholder="Masukkan Nama Produk">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Produk</label>
                        <input type="text" class="form-control" name="harga" id="harga"
                            value="{{ $produk->harga }}" placeholder="Masukkan Harga Produk">
                    </div>
                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat Produk</label>
                        <input type="text" class="form-control" name="berat" id="berat"
                            value="{{ $produk->berat }}" placeholder="Masukkan Berat Produk">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok Produk</label>
                        <input type="number" class="form-control" name="stok" id="stok" value="{{ $produk->stok }}"
                            placeholder="Masukkan Stok Produk">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_terjual" class="form-label">Jumlah Terjual</label>
                        <input type="number" class="form-control" name="jumlah_terjual" id="jumlah_terjual"
                            value="{{ $produk->jumlah_terjual }}" placeholder="Masukkan Jumlah Terjual">
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating Produk</label>
                        <input type="number" class="form-control" name="rating" id="rating"
                            value="{{ $produk->rating }}" placeholder="Masukkan Rating Produk">
                    </div>
                    <div class="mb-3">
                        <label for="no_wa" class="form-label">Nomor Whatsapp</label>
                        <input type="number" class="form-control" name="no_wa" id="no_wa"
                            value="{{ $produk->no_wa }}" placeholder="Masukkan Nomor Whatsapp">
                    </div>
                    <div class="mb-3">
                        <label for="link_shopee" class="form-label">Link Shopee</label>
                        <input type="url" class="form-control" name="link_shopee" id="link_shopee"
                            value="{{ $produk->link_shopee }}" placeholder="Masukkan Link Shopee">
                    </div>
                    <div class="mb-3">
                        <label for="link_tokopedia" class="form-label">Link Tiktok Shop</label>
                        <input type="url" class="form-control" name="link_tokopedia" id="link_tokopedia"
                            value="{{ $produk->link_tokopedia }}" placeholder="Masukkan Link Tiktok Shop">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                        <textarea name="deskripsi" id="editor" style="height: 100px; color:#000;">{{ $produk->deskripsi }}</textarea>
                    </div>
                    <div class="mt-5 justify-content-center d-flex gap-2">
                        <a href="{{ url('/admin/produk') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
