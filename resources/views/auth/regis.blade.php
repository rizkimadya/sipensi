<!doctype html>
<html lang="en">

<head>
    <title>Halaman Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets_login//css/style.css') }}">

</head>

<body class="img js-fullheight" style="background-image: url(assets_login/images/bg2.jpg);">
    @include('sweetalert::alert')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <a href="{{url('/')}}" class="d-flex justify-content-center mb-3">
                        <img alt="Logo" class="heading-section mb-0" src="{{ asset('assets2/media/logos/sipensi-logo.png') }}" style="width: 50%;" />
                    </a>
                    <span class="bg-white py-1 px-2">Sistem Informasi Penyewaan & Reservasi Villa</span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @if (session('success'))
                        <p class="alert alert-success">{{ session('success') }}</p>
                    @endif
                    @if (session('wait'))
                        <p class="alert alert-danger">{{ session('wait') }}</p>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif
                    <div class="login-wrap p-0">
                        <form action="{{ url('/regis') }}" method="POST" class="signin-form">
                            @csrf
                            <input type="hidden" name="roles" value="user">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="no_wa" placeholder="Nomor Whatsapp"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input id="password-field" type="password" class="form-control"
                                            placeholder="Password" name="password" required>
                                        <span toggle="#password-field"
                                            class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group w-100">
                                        <a href="{{ url('/login') }}" type="submit" style="padding: 12px;"
                                            class="form-control btn btn-outline-primary submit px-3 pb-0">Login</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit"
                                            class="form-control btn btn-primary submit px-3">Registration</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets_login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_login/js/popper.js') }}"></script>
    <script src="{{ asset('assets_login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_login/js/main.js') }}"></script>

</body>

</html>
