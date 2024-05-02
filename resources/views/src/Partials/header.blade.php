<!-- header section strats -->
<header class="header_section">
    <div class="header_top">
        <div class="container">
            <div class="contact_nav">
                <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span class="ml-1">
                        Phone : +62 XXXX XXXX XXXX
                    </span>
                </a>
                <a href="">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span class="ml-1">
                        Email : akses.care@gmail.com
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('img/logo_akses.png') }}" alt="logo akses">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link @yield('home')" href="/">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @yield('education')" href="">Halaman Edukasi</a>
                            </li>
                        </ul>
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle shadow-none" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="background-color:#019F90; border: none;">
                                Institusi Kesehatan
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item @yield('institution')" href="{{url('/roles')}}">Pengajuan Verifikasi Institusi Kesehatan</a>
                                <a class="dropdown-item @yield('check')" href="{{url('/health-institution/check-status')}}">Cek Status Verifikasi Institusi Kesehatan</a>
                            </div>
                        </div>
                    </div>
                    <div class="quote_btn-container">
                        <a href="login">
                            <span>
                                Login
                            </span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- end header section -->
