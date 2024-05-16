@extends('src.Admin.Template.main-template')
@section('drug-presentation', 'active')
@section('title', 'Presentasi Obat')
@section('content')


    <main>
        <div class="container mt-5">
            @if (Session::has('success-to-create-presentation'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success-to-create-presentation') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-capitalize">
                    formulir Pembuatan Sediaan Obat
                </div>
                <form action="{{ url('/drugs/create-drug=presentation') }}" method="POST" class="px-5 py-5">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sediaan / Form</label>
                        <input type="text" placeholder="Contoh: Sanmol oral drops 60 mg/0.6 mL" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="form" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sediaan / Harga</label>
                        <input class="form-control" placeholder="Contoh: 15 mL x 1's (Rp17,000/boks)"
                            name="packaging_and_price" id="exampleFormControlTextarea1" required>
                    </div>
                    <a href="{{ url('/drug/presentations') }}" class="btn btn-primary mt-3 mr-3 back-btn">Lihat
                        Presentasi Obat</a>
                    <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Buat Presentasi
                        Obat</button>
                </form>
            </div>
        </div>
    </main>


@endsection
