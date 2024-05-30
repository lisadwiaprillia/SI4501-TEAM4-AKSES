@extends('src.Admin.Template.main-template')
@section('drug-data', 'active')
@section('title', 'Edit Data Obat')
@section('content')
    <main>
        <div class="container mt-5">
            <div class="container">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <p class="mt-5 ml-3 fw-bold fs-3 text-capitalize">Edit Data Obat</p>
                <a href="{{ url('/drugs') }}" class="btn btn-secondary ml-3">Kembali</a>

                <div class="card mt-4">
                    <div class="card-body">
                        <form action="{{ url('/drugs/' . $drug_data->id . '/update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="form">Konten</label>
                                <input type="text" class="form-control" id="form" name="form" value="{{ $drug_data->form }}" required>
                            </div>

                            <div class="form-group">
                                <label for="packaging_and_price">Indikasi</label>
                                <input type="text" class="form-control" id="packaging_and_price" name="packaging_and_price" value="{{ $drug_data->packaging_and_price }}" required>
                            </div>

                            <div class="form-group">
                                <label for="reaction">Reaksi</label>
                                <input type="text" class="form-control" id="reaction" name="reaction" value="{{ $drug_data->reaction }}" required>
                            </div>

                            <div class="form-group">
                                <label for="classification">Klasifikasi</label>
                                <input type="text" class="form-control" id="classification" name="classification" value="{{ $drug_data->classification }}" required>
                            </div>

                            <div class="form-group">
                                <label for="warning">Peringatan</label>
                                <input type="text" class="form-control" id="warning" name="warning" value="{{ $drug_data->warning }}" required>
                            </div>

                            <div class="form-group">
                                <label for="contraindication">Kontradiksi</label>
                                <input type="text" class="form-control" id="contraindication" name="contraindication" value="{{ $drug_data->contraindication }}" required>
                            </div>

                            <div class="form-group">
                                <label for="dosage">Dosis</label>
                                <input type="text" class="form-control" id="dosage" name="dosage" value="{{ $drug_data->dosage }}" required>
                            </div>

                            <div class="form-group">
                                <label for="interaction">Interaksi</label>
                                <input type="text" class="form-control" id="interaction" name="interaction" value="{{ $drug_data->interaction }}" required>
                            </div>

                            <div class="form-group">
                                <label for="regulation">Regulasi</label>
                                <input type="text" class="form-control" id="regulation" name="regulation" value="{{ $drug_data->regulation }}" required>
                            </div>

                            <div class="form-group">
                                <label for="drug_category">Kategori Obat</label>
                                <input type="text" class="form-control" id="drug_category" name="drug_category" value="{{ $drug_data->drug_category }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
