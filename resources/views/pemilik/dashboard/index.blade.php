@extends('layoutAdmin.app', ['title' => 'Dashboard'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-md-5 p-4 mb-md-5 mb-3">
                <div class="d-flex align-items-center">
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $villa_count }}</span>
                    <span class="menu-icon ms-auto">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg id="villa" width="24" height="24" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <style>
                                    svg {
                                        fill: #44fd1e
                                    }
                                </style>
                                <path opacity="0.3"
                                    d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z" />
                                <path opacity="0.3"
                                    d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z" />
                                <path opacity="0.3"
                                    d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z" />
                                <path
                                    d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <span class="text-gray-700 pt-1 fw-semibold fs-6">Jumlah Villa</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-md-5 p-4 mb-md-5 mb-3">
                <div class="d-flex align-items-center">
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $transaksi_count }}</span>
                    <span class="menu-icon ms-auto">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg id="transaksi" width="24" height="24" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <style>
                                    #transaksi {
                                        fill: #f01717
                                    }
                                </style>
                                <path opacity="0.3"
                                    d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" />
                                <path
                                    d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <span class="text-gray-700 pt-1 fw-semibold fs-6">Jumlah Transaksi</span>
            </div>
        </div>
    </div>
@endsection
