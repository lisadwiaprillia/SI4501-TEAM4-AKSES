@extends('src.Admin.Template.main-template')
@section('drug-data', 'active')
@section('title', 'Data Obat')
@section('content')
    <main>
        <main>
            <div class="container mt-5">
                @if (Session::has('fail-to-update-drug-class'))
                    <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
                        {{ Session::get('fail-to-update-drug-class') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-capitalize">
                        formulir Perubahan Data Data Obat
                    </div>
                    <form action="{{ url('/drugs/' . $drug_data->data_id . '/update-data') }}"
                        method="POST" class="px-5 py-5" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" value="{{ $drug_data->form }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="form" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Konten</label>
                            <input type="text" value="{{ $drug_data->packaging_and_price }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="packaging_and_price" required>
                        </div>
                        <a type="button" class="btn mt-3 mr-2 back-btn" href="{{ url('/drugs/classes') }}">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Edit</button>
                    </form>
                </div>
            </div>
        </main>
    @endsection
