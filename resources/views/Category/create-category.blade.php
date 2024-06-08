@extends('src.Admin.Template.main-template')

@section('title', 'Pembuatan Data Kategori')
@section('category', 'active')

@section('content')

    <main>
        <div class="container mt-5">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success-to-create-role') }}
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
                    formulir Pembuatan Kategori Baru
                </div>
                <form action="{{ url('/categories/create') }}" method="POST" class="px-5 py-5">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori</label>
                        <input type="text" placeholder="Contoh: Pencegahan Penyakit" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="category_name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Singkat Kategori</label>
                        <textarea class="form-control" placeholder="Contoh: Pencegahan Penyakit " name="category_desc"
                            id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                    <a href="{{ url('/categories') }}" class="btn btn-primary mt-3 mr-3 back-btn">Lihat
                        Kategori</a>
                    <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Buat Kategori</button>
                </form>
            </div>
        </div>
    </main>

@endsection
