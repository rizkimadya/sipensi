<div class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <ul class="info">
                    <li><i class="fa fa-envelope"></i> villabukitlereng@gmail.com</li>
                    <li><i class="fa fa-map"></i> Villa Bukit Lereng Malino </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4">
                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky shadow">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ url('/') }}" style="width: 20%;" class="pt-3">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    @if (auth()->user() && auth()->user()->roles === 'penyewa')
                        <ul class="nav">
                            <li><a href="{{ url('/') }}" class="{{ $title == 'Home' ? 'active' : '' }}">Home</a>
                            </li>
                            <li><a href="{{ url('/spk') }}" class="{{ $title == 'SPK' ? 'active' : '' }}">Sistem
                                Pendukung Keputusan</a>
                            </li>
                            <li><a href="{{ url('/villa') }}"
                                    class="{{ $title == 'Villa' ? 'active' : '' }}">Villa</a></li>
                            <li><a href="{{ url('/transaksi') }}"
                                    class="{{ $title == 'Riwayat Reservasi' ? 'active' : '' }}">Riwayat Reservasi</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-calendar"></i> Logout</a></li>
                        </ul>
                    @else
                        <ul class="nav">
                            <li><a href="{{ url('/') }}" class="{{ $title == 'Home' ? 'active' : '' }}">Home</a>
                            </li>
                            <li><a href="{{ url('/spk') }}" class="{{ $title == 'SPK' ? 'active' : '' }}">Sistem
                                    Pendukung Keputusan</a>
                            </li>
                            <li><a href="{{ url('/login') }}"><i class="fa fa-calendar"></i> Login</a></li>
                        </ul>
                    @endif
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
