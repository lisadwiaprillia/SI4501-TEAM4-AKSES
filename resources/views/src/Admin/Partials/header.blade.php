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
                                <a class="nav-link @yield('home')" href="{{ url('/staff-dashboard') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @yield('education') mr-5" href="">Halaman Edukasi</a>
                            </li>
                        </ul>
                        <div class="dropdown show nav-link mr-5">
                            <a class="dropdown-toggle shadow-none nav-link" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="color: black">
                                Data Institusi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item @yield('institution')" href="{{ url('/health-institution') }}">Data Institusi Kesehatan</a></li>
                                <li><a class="dropdown-item @yield('drug-regulation')" href="">Data Regulasi Obat</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item @yield('roles')" href="{{ url('/roles') }}">Data Role</a>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown show">
                            <a class="dropdown-toggle shadow-none" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black">
                                Menu Obat
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item @yield('drug-presentation')" href="{{ url('/drug/presentations') }}">Data
                                    Sediaan Obat</a>
                                <a class="dropdown-item @yield('drug-classes')" href={{ url('/drugs/classes') }}>Data Kelas
                                    Obat</a>
                                <a class="dropdown-item @yield('drug-regulation')" href="">Data Regulasi Obat</a>
                            </div>
                        </div>
                    </div>
                    <div class="quote_btn-container">
                        <a href="{{ url('/logout') }}">
                            <span>
                                Logout
                            </span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- end header section -->
