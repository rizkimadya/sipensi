@extends('LayoutAdmin.app', ['title' => 'Villa'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card table-responsive p-md-4 p-2">
                <form action="/pemilik/villa/update/{{ $villa->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar <i>*pilih banyak gambar</i></label>
                                <input type="file" class="form-control" name="gambar[]" id="gambar"
                                    multiple accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="nama_villa" class="form-label">Nama Villa</label>
                                <input type="text" class="form-control" name="nama_villa" id="nama_villa"
                                    required value="{{$villa->nama_villa}}" placeholder="Masukkan Nama Villa">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Sewa Villa</label>
                                <input type="number" class="form-control" name="harga" id="harga" required value="{{$villa->harga}}"
                                    placeholder="Masukkan Harga Sewa Villa">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Villa</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" required value="{{$villa->alamat}}"
                                    placeholder="Masukkan Alamat Villa">
                            </div>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Link Maps Lokasi Villa</label>
                                <input type="link" class="form-control" name="lokasi" id="lokasi" required value="{{$villa->lokasi}}"
                                    placeholder="Masukkan Link Maps Lokasi Villa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="" selected disabled>Pilih Status</option>
                                    <option {{$villa->status == 'Tersedia' ? 'selected' : ''}} value="Tersedia">Tersedia</option>
                                    <option {{$villa->status == 'Terisi' ? 'selected' : ''}} value="Terisi">Terisi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kamar_tidur" class="form-label">Jumlah Kamar Tidur</label>
                                <input type="number" class="form-control" name="kamar_tidur" id="kamar_tidur" required
                                    placeholder="Masukkan Jumlah Kamar Tidur" value="{{$villa->kamar_tidur}}">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_wc" class="form-label">Jumlah Kamar Mandi/Toilet</label>
                                <input type="number" class="form-control" name="jumlah_wc" id="jumlah_wc" required
                                    placeholder="Masukkan Jumlah Kamar Mandi/Toilet" value="{{$villa->jumlah_wc}}">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_cctv" class="form-label">Jumlah CCTV</label>
                                <input type="number" class="form-control" name="jumlah_cctv" id="jumlah_cctv" required
                                    placeholder="Masukkan Jumlah CCTV" value="{{$villa->jumlah_cctv}}">
                            </div>
                            <div class="mb-3">
                                <label for="daya_tampung" class="form-label">Jumlah Daya Tampung</label>
                                <input type="number" class="form-control" name="daya_tampung" id="daya_tampung" required
                                    placeholder="Masukkan Jumlah Daya Tampung" value="{{$villa->daya_tampung}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="editor" style="height: 100px; color:#000;">{{ $villa->keterangan }}</textarea>
                    </div>
                    <div class="mt-5 justify-content-center d-flex gap-2">
                        <a href="{{ url('/pemilik/villa') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
