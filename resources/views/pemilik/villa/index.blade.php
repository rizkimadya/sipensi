@extends('LayoutAdmin.app', ['title' => 'Villa'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card table-responsive p-md-4 p-2">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Villa</th>
                            <th>Harga</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Kamar Tidur</th>
                            <th>Kamar Mandi</th>
                            <th>CCTV</th>
                            <th>Daya Tampung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($villa as $item)
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
                                <td>{{ $item->nama_villa }}</td>
                                <td>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</td>
                                <td>{{ $item->alamat }}</td>
                                @if ($item->status == 'Tersedia')
                                <td class="fw-bold text-success">{{ $item->status }}</td>
                                @else
                                <td class="fw-bold text-danger">{{ $item->status }}</td>
                                @endif
                                <td>{{ $item->kamar_tidur }}</td>
                                <td>{{ $item->jumlah_wc }}</td>
                                <td>{{ $item->jumlah_cctv }}</td>
                                <td>{{ $item->daya_tampung }} Orang</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
