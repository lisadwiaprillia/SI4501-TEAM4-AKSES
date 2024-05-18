<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('institution', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">
            @if (Session::has('success-to-create-role'))
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
                    formulir Pembuatan Role Baru
                </div>
                <form action="{{ url('/create-roles') }}" method="POST" class="px-5 py-5">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama role</label>
                        <input type="text" placeholder="Contoh: Apoteker" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="role_name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Singkat Role</label>
                        <textarea class="form-control" placeholder="Contoh: Role Untuk Para Apoteker Yang Terlibat" name="role_desc"
                            id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                    <a href="{{ url('/roles') }}" class="btn btn-primary mt-3 mr-3 back-btn">Lihat
                        Role</a>
                    <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Buat Role</button>
                </form>
            </div>
        </div>
    </main>


@endsection
