<!-- Import Template -->
@extends('src.Template.no-header')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<style>
    .chat-container {
        display: flex;
        max-width: 90%;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        flex-direction: row;
    }
    .chat-sidebar {
        flex: 30%;
        padding: 20px;
        border-right: 1px solid #ddd;
        overflow-y: auto;
    }
    .chat-main {
        flex: 70%;
        padding: 20px;
        overflow-y: auto;
        flex-direction: column;
    }
    .chat {
        flex-grow: 1; /* Allows the chat area to grow vertically */
        overflow-y: auto; /* Enables vertical scrolling */
    }
    .chat-message {
        display: flex;
        margin-bottom: 20px;
    }
    .chat-message .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .chat-message .message-bubble {
        background-color: #329A93;
        color: white;
        padding: 10px;
        border-radius: 8px;
    }
    .message-bubble-answer {
        background-color: #F4F4F4;
        padding: 10px;
        border-radius: 8px;
    }

    .search-container {
        position: relative;
        width: 100%;
        margin-bottom: 20px;
    }

    .search-container i {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
    }

    .search-input {
        width: 100%;
        padding: 10px 35px 10px 30px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        outline: none; 
        transition: border-color 0.3s ease-in-out;
        background-color: #EDEDED;
    }

    .text-profile {
        font-weight: 600;
    }
    .text-title {
        font-weight: 800;
        font-size: 28px;
        margin-bottom: 20px;
    }
    .notif-chat {
        display: inline-block;
        width: 25px; 
        height: 25px; 
        border-radius: 50%; 
        background-color: #FF3636;
        color: white;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        line-height: 25px;
    }
    .text-name {
        font-weight: 600;
        font-size: 18px;
    }
    .profile-chat {
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 5px;
        background-color: #329A93;
        color: white;
    }
    .profile-chat img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 40px;
    }
    .profile-chat p {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
    }
    .today {
        display: inline-block;
        background-color: #329A93;
        color: white;
        border-radius: 10px;
        padding: 10px 20px;
        margin: 15px 0; 
        text-align: center;
    }
    
    .chat-input {
        display: flex;
        align-items: center;
        padding: 10px 20px 10px 20px;
        background-color: #f9f9f9;
        border-radius: 15px;
        margin-top: 34px;
    }

    .chat-input input {
        flex: 1;
        margin: 0 10px;
        border: none;
        outline: none;
    }

    .icon-send {
        display: inline-block;
        width: 40px; 
        height: 40px; 
        border-radius: 50%; 
        background-color: #329A93;
        color: white;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        line-height: 25px;
        margin-left: 10px;
        cursor: pointer;
    }

    .icon-send i {
    line-height: 40px;
}


</style>

<!-- Import Layouting -->
@section('content')

    <!-- START header section strats -->
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
    <!-- END header section strats -->

    <!-- start content -->
        <div class="chat-container">
            <!-- Main Chat Area -->
            <div class="chat-main">
                <div class="profile-chat d-flex align-items-center">
                    <img src="{{ asset('img/photo-profile.png') }}" alt="Profile" class="avatar mr-3">
                    <p>Apt., Muhammad Juanda</p>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="today">TODAY</div>
                </div>

                <!-- Chat -->
                <div class="chat">
                    <div class="chat-message col-md-6">
                        <img src="{{ asset('img/photo-profile.png') }}" alt="Profile" class="avatar">
                        <div class="">
                            <p class="message-bubble-answer mb-0">
                                Saat ini kamu sudah terhubung dengan Apt., Muhammad Juanda. Halo ada yang bisa saya bantu?
                            </p>
                            <span class="time-chat">3:17 PM</span>
                        </div>
                    </div>
                    
                    <div class="chat-message d-flex flex-row-reverse">
                        <img src="{{ asset('img/photo-profile.png') }}" alt="Profile" class="avatar">
                        <div class="ml-3">
                            <p class="message-bubble mb-0">
                                Halo pak, saya akhir2 ini mengeluhkan pusing sakit kepala, dan kira2 obat apa yang cocok untuk sakit kepala ringan?
                            </p>
                            <span class="time-chat">3:17 PM</span>
                        </div>
                    </div>

                    <div class="chat-message col-md-6">
                        <img src="{{ asset('img/photo-profile.png') }}" alt="Profile" class="avatar">
                        <div class="">
                            <p class="message-bubble-answer mb-0">
                                Halo, Nafi!. Untuk obat yang disarankan ketika pertama kali pusing sakit kepala adalah panadol, karena ringan dosis.
                            </p>
                            <span class="time-chat">3:17 PM</span>
                        </div>
                    </div>

                    <div class="chat-message d-flex flex-row-reverse">
                        <img src="{{ asset('img/photo-profile.png') }}" alt="Profile" class="avatar">
                        <div class="ml-3">
                            <p class="message-bubble mb-0">
                                Baik, pak. Terimakasih banyak nanti saya akan mampir ke puskesmas terdekat. Selamat siang pak.
                            </p>
                            <span class="time-chat">3:17 PM</span>
                        </div>
                    </div>
                </div>

                <div class="chat-input">
                    <i class="fa-solid fa-paperclip"></i>
                    <input type="text" class="chat-input" placeholder="Ketik pesanmu">
                    <i class="fa-regular fa-face-laugh"></i>
                    <div class="icon-send">
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                </div>
            </div>
        </div>



@endsection
