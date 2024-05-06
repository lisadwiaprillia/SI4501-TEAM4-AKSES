<!-- Import Template -->
@extends('src.Template.no-header')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Import Layouting -->
@section('content')

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
                    <a href="">
                        <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                        <span class="ml-1">
                            Location
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
                                    <a class="nav-link @yield('')" href="">Persediaan Obat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('')" href="">Kelas Obat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('')" href="">Sub Kelas Obat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('')" href="">Resep Obat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('')" href="">Unit Obat</a>
                                </li>
                            </ul>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle shadow-none" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="background-color:#019F90; border: none;">
                                    Lainnya
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item @yield('institution')" href="{{ route('institution') }}">Pengajuan
                                        Verifikasi Institusi Kesehatan</a>
                                    <a class="dropdown-item @yield('check')"
                                        href="{{ url('/health-institution/check-status') }}">Cek Status Verifikasi Institusi
                                        Kesehatan</a>
                                    <a class="dropdown-item @yield('employee-request')"
                                        href="{{ url('employee-request') }}">Pengajuan Verifikasi Tenaga Kesehatan</a>
                                    <a class="dropdown-item @yield('employee-check')"
                                        href="{{ url('/health-institution/check-status') }}">Cek Status Verifikasi Tenaga
                                        kesehatan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- start content -->
    <section class="slider_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="play_btn">
                            <button>
                                <i class="fa fa-play" aria-hidden="true"></i>
                            </button>
                        </div>
                        <h1>
                            Hello, <br>
                            <span>
                                Lisa
                            </span>
                        </h1>
                        <p>
                            when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters, as opposed to
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="img/slider-img.jpg" alt="image-slider">
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
