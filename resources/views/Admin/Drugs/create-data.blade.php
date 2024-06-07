@extends('src.Admin.Template.main-template')
@section('drug-data', 'active')
@section('title', 'Buat Data Obat')
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

                <div class="card mt-4">
                    <div class="card">
                        <div class="card-header mt-2 text-capitalize">
                            <h3>Form Pembuatan data obat</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/drugs/create-drug-data') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="drug_name">Nama Obat</label>
                                            <input type="text" class="form-control" id="drug_name" name="drug_name"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contents">Kandungan</label>
                                            <input type="text" class="form-control" id="contents" name="contents"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="indications">Indikasi/ Dipakai Untuk</label>
                                            <input type="text" class="form-control" id="indications" name="indications"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dosage">Dosis</label>
                                            <input type="text" class="form-control" id="dosage" name="dosage"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contraindication">Kontraindikasi</label>
                                            <input type="text" class="form-control" id="contraindication"
                                                name="contraindication" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="special_precautions">Pencegahan Khusus</label>
                                            <input type="text" class="form-control" id="special_precautions"
                                                name="special_precautions" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="drug_interaction">Interaksi Obat</label>
                                            <input type="text" class="form-control" id="drug_interaction"
                                                name="drug_interaction" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="adverse_reactions">Reaksi merugikan</label>
                                            <input type="text" class="form-control" id="adverse_reactions"
                                                name="adverse_reactions" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="atc_classification">Anatomical Therapeutic Chemical (ATC)
                                            </label>
                                            <input type="text" class="form-control" id="atc_classification"
                                                name="atc_classification" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="presentation_id">Sediaan Obat</label>
                                        <select class="form-control" id="presentation_id" name="presentation_id" required>
                                            <option value="" disabled selected>Pilih Salah Satu</option>
                                            @foreach ($drug_presentation as $presentation)
                                                <option value="{{ $presentation->presentation_id }}">
                                                    {{ $presentation->form }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="class_id">Klasifikasi Obat</label>
                                        <select class="form-control" id="class_id" name="class_id" required>
                                            <option value="" disabled selected>Pilih Salah Satu</option>
                                            @foreach ($drug_class as $class)
                                                <option value="{{ $class->class_id }}">{{ $class->class_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="regulatory_id">Regulasi Obat</label>
                                        <select class="form-control" id="regulatory_id" name="regulatory_id" required>
                                            <option value="" disabled selected>Pilih Salah Satu</option>
                                            @foreach ($drug_regulatory as $reg)
                                                <option value="{{ $reg->regulatory_id }}">{{ $reg->regulatory_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <a href="{{ url('/drug/data') }}" class="btn btn-primary mt-3 mr-3 back-btn">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Buat
                                    Data
                                    Obat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
