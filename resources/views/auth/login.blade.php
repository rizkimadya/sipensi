<!doctype html>
<html lang="en">

<head>
    <title>Halaman Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets_login//css/style.css') }}">

</head>

<body class="img js-fullheight" style="background-image: url(assets_login/images/bg.jpg);">
    @include('sweetalert::alert')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section mb-0">SIPENSI</h2>
                    <span class="bg-white py-1 px-2">Sistem Informasi Penyewaan & Reservasi Villa</span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
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
                        <form action="{{ url('/login') }}" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="password" type="password" class="form-control" placeholder="Password"
                                    required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                        </form>
                        <a href="{{ url('/regis') }}">
                            <p class="w-100 text-center text-white" style="text-decoration: underline;"> Registration
                            </p>
                        </a>
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
