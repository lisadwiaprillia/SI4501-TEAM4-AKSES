@extends('src.Admin.Template.main-template')
@section('drug-classes', 'active')
@section('title', 'Buat Kelas Obat')
@section('content')

    <main>
        <div class="container mt-5">
            @if (Session::has('success-to-create-class'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success-to-create-class') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-capitalize">
                    formulir Pembuatan Kelas Obat
                </div>
                <form action="{{ url('/drugs/class/store') }}" method="POST" class="px-5 py-5">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kelas</label>
                        <input type="text" placeholder="Contoh: Analgesics" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="class_name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Singkat Kelas</label>
                        <textarea class="form-control"
                            placeholder="Contoh: obat yang sering digunakan untuk meredakan rasa sakit dan menurunkan demam." name="class_desc"
                            id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                    <a href="{{ url('/drugs/classes') }}" class="btn btn-primary mt-3 mr-3 back-btn">Lihat
                        Kelas Obat</a>
                    <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Buat Kelas
                        Obat</button>
                </form>
            </div>
        </div>
    </main>


@endsection
