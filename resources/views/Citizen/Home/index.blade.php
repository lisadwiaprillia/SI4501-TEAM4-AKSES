<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('home', 'active')

<!-- Import Layouting -->
@section('content')

    <!-- slider section -->
    <section class="slider_section ">
        <div class="dot_design">
            <img src="{{ asset('img/dots.png') }}" alt="">
        </div>
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <div class="play_btn">
                                        <button>
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <h1>
                                        Aplikasi Kendali Perbekalan Kesehatan <br>
                                        <span>
                                            AKSES
                                        </span>
                                    </h1>
                                    <p>
                                        when looking at its layout. The point of using Lorem Ipsum is that it has a
                                        more-or-less normal distribution of letters, as opposed to
                                    </p>

                                    <a href="{{ url('https://api.whatsapp.com/send?phone=6282158204550') }}" target="_new"
                                        class="share-button">
                                        Hubungi Kami
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="img/slider-img.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <div class="play_btn">
                                        <button>
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <h1>
                                        Aplikasi Kendali Perbekalan Kesehatan <br>
                                        <span>
                                            AKSES
                                        </span>
                                    </h1>
                                    <p>
                                        when looking at its layout. The point of using Lorem Ipsum is that it has a
                                        more-or-less normal distribution of letters, as opposed to
                                    </p>
                                    <a href="{{ url('https://api.whatsapp.com/send?phone=6282158204550') }} "
                                        class="share-button" target="_blank">
                                        Hubungi Kami
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="img/slider-img.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <div class="play_btn">
                                        <button>
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <h1>
                                        Aplikasi Kendali Perbekalan Kesehatan <br>
                                        <span>
                                            AKSES
                                        </span>
                                    </h1>
                                    <p>
                                        when looking at its layout. The point of using Lorem Ipsum is that it has a
                                        more-or-less normal distribution of letters, as opposed to
                                    </p>
                                    <a href="{{ url('https://api.whatsapp.com/send?phone=6282158204550') }}" target="_blank"
                                        class="share-button">
                                        Hubungi Kami
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="img/slider-img.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_btn-box">
                <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                    <img src="img/prev.png" alt="">
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                    <img src="img/next.png" alt="">
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </section>
    <!-- end slider section -->
    </div>


    <!-- about section -->
    <section class="book_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <section class="about_section">
                        <div class="container  ">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="img-box">
                                        <img src="img/about-img.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <div class="heading_container">
                                            <h2>
                                                Tentang <span>AKSES</span>
                                            </h2>
                                        </div>
                                        <p>
                                            has a more-or-less normal distribution of letters, as opposed to using 'Content
                                            here, content here', making it look like readable English. Many desktop
                                            publishing packages and web page editors has a more-or-less normal distribution
                                            of letters, as opposed to using 'Content here, content here', making it look
                                            like readable English. Many desktop publishing packages and web page editors
                                        </p>
                                        <a href="">
                                            Baca Selanjutnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- rekom obat section -->
    <section class="book_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <section class="rekomobat_section">
                        <div class="card" style="background-color: rgb(1, 159, 144); padding: 80px;">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="detail-box">
                                        <div class="heading_container">
                                            <h2 style="color: white;">
                                                Cari rekomendasi obat
                                                sesuai keluhan kamu !
                                            </h2>
                                        </div>
                                        <br>
                                        <p style="color: white;">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit
                                            Proin venenatis pellentesque vitae porta consectetur
                                            nunc.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center">
                                    <div class="card"
                                        style="background-color: rgb(1, 159, 144); border: 1px solid white; padding: 15px; text-decoration: none; border-radius: 5px;"
                                        onmouseover="this.style.backgroundColor='white'"
                                        onmouseout="this.style.backgroundColor='rgb(1, 159, 144)'">
                                        <div class="card-body">
                                            <a href="" style="color: white; font-weight: bold;"
                                                onmouseover="this.style.color='rgb(1, 159, 144)'"
                                                onmouseout="this.style.color='rgb(255, 255, 255)'">Cari Obat</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center">
                                    <div class="card"
                                        style="background-color: rgb(1, 159, 144); border: 1px solid white; padding: 15px; text-decoration: none; border-radius: 5px;"
                                        onmouseover="this.style.backgroundColor='white'"
                                        onmouseout="this.style.backgroundColor='rgb(1, 159, 144)'">
                                        <div class="card-body">
                                            <a href="{{ url('/education-page') }}" style="color: white; font-weight: bold;"
                                                onmouseover="this.style.color='rgb(1, 159, 144)'"
                                                onmouseout="this.style.color='rgb(255, 255, 255)'">Baca edukasi lainnya</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
