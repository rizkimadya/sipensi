@extends('layoutAdmin.app', ['title' => 'Dashboard'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card p-md-5 p-4 mb-md-5 mb-3">
                <div class="d-flex align-items-center">
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">1</span>
                    <span class="menu-icon ms-auto">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z"
                                    fill="currentColor" />
                                <path
                                    d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <span class="text-gray-400 pt-1 fw-semibold fs-6">Jumlah Villa</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-md-5 p-4 mb-md-5 mb-3">
                <div class="d-flex align-items-center">
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">2</span>
                    <span class="menu-icon ms-auto">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                    fill="currentColor" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                    fill="currentColor" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <span class="text-gray-400 pt-1 fw-semibold fs-6">Jumlah Pemilik Villa</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-md-5 p-4 mb-md-5 mb-3">
                <div class="d-flex align-items-center">
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">3</span>
                    <span class="menu-icon ms-auto">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <span class="text-gray-400 pt-1 fw-semibold fs-6">Jumlah Penyewa</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-md-5 p-4 mb-md-5 mb-3">
                <div class="d-flex align-items-center">
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">4</span>
                    <span class="menu-icon ms-auto">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                    fill="currentColor" />
                                <path
                                    d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <span class="text-gray-400 pt-1 fw-semibold fs-6">Jumlah Transaksi</span>
            </div>
        </div>
    </div>
@endsection
