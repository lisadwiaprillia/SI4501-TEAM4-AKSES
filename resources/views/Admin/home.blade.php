@extends('src.Admin.Template.main-template')
@section('home', 'active')
@section('title', 'Beranda')
@section('content')

    @if (Session::get('isAdmin') === false)
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
                                            Halo, <br>
                                            <span>
                                                {{ Session::get('user') }}
                                            </span>
                                        </h1>
                                        <p>
                                            when looking at its layout. The point of using Lorem Ipsum is that it has a
                                            more-or-less normal distribution of letters, as opposed to
                                        </p>
                                        <a href="{{ url('https://api.whatsapp.com/send?phone=6282158204550') }}"
                                            target="_new">
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
                                            Halo, <br>
                                            <span>
                                                {{ Session::get('user') }}
                                            </span>
                                        </h1>
                                        <p>
                                            when looking at its layout. The point of using Lorem Ipsum is that it has a
                                            more-or-less normal distribution of letters, as opposed to
                                        </p>
                                        <a href="{{ url('https://api.whatsapp.com/send?phone=6282158204550') }}">
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
                                            Halo, <br>
                                            <span>
                                                {{ Session::get('user') }}
                                            </span>
                                        </h1>
                                        <p>
                                            when looking at its layout. The point of using Lorem Ipsum is that it has a
                                            more-or-less normal distribution of letters, as opposed to
                                        </p>
                                        <a href="{{ url('https://api.whatsapp.com/send?phone=6282158204550') }}">
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
    @else
        {{-- Admin Section --}}

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Total Obat</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{ $total_drug }}</h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Today: 20 orders</li>
                                <li>Yesterday: 30 orders</li>
                                <li>This Week: 150 orders</li>
                                <li>This Month: 500 orders</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Total Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{ $total_user }}</h1>
                            <p class="text-capitalize font-weight-medium">Rincian: </p>
                            <ul class="list-unstyled mt-2 mb-4">
                                <li>Total Admin: {{ $total_admin }}</li>
                                <li>Total Apoteker: {{ $total_apoteker }}</li>
                                <li>Total Pengguna Biasa: {{ $total_normal_user }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Customer Engagement</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">250</h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>New Customers Today: 10</li>
                                <li>Returning Customers: 100</li>
                                <li>Newsletter Subscriptions: 150</li>
                                <li>Customer Support Tickets Open: 5</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endif



    </section>
    <!-- end slider section -->
    </div>

@endsection
