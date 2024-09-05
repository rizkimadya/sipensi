<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" />
    <title>{{ config('app.name') . ' | ' . $title }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body style="font-family: Cerebri Sans">
    @include('sweetalert::alert')

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    @include('layoutUser.navbar')

    <section>
        @yield('contentUser')
    </section>


    <footer style="font-size: larger">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="text-white">Copyright © 2024 Villa Agency Co. All rights reserved.</div>
                <div>
                    <ul class="social-links d-flex">
                        <li><a href="#"><i class="fab fa-facebook" style="color: rgb(0, 70, 117)"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter" style="color: rgb(76, 164, 223)"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin" style="color: rgb(13, 35, 224)"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram" style="color: rgb(255, 15, 163)"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <button id="backToBottom" type="button" onclick="scrollToBottom()" class="btn btn-outline-danger back-to-bottom"><i
            class="fa-solid fa-arrow-down"></i></button>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/counter.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @yield('script')

    <script>
        // Tampilkan tombol ketika pengguna scroll ke atas dari bagian bawah halaman
        window.onscroll = function() {
            let scrollPosition = window.scrollY || document.documentElement.scrollTop;
            let windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;

            if (scrollPosition < windowHeight - 50) {
                document.getElementById("backToBottom").style.display = "block";
            } else {
                document.getElementById("backToBottom").style.display = "none";
            }
        };

        // Fungsi untuk scroll ke bagian bawah halaman
        function scrollToBottom() {
            window.scrollTo({
                top: document.documentElement.scrollHeight,
                behavior: "smooth"
            });
        }
    </script>

</body>

</html>
