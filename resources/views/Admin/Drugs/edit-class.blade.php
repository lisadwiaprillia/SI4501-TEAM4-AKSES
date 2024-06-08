@extends('src.Admin.Template.main-template')
@section('drug-classes', 'active')
@section('title', 'Edit Kelas Obat')
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
                        formulir Perubahan Data Klasifikasi Obat
                    </div>
                    <form action="{{ url('/drugs/class/' . $drug_class->class_id . '/update-form') }}" method="POST"
                        class="px-5 py-5" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Klasifikasi Obat</label>
                            <input type="text" value="{{ $drug_class->class_name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="class_name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi Klasifikasi Obat</label>
                            <input type="text" value="{{ $drug_class->class_desc }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="class_desc" required>
                        </div>
                        <a type="button" class="btn mt-3 mr-2 back-btn" href="{{ url('/drugs/classes') }}">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Edit</button>
                    </form>
                </div>
            </div>
        </main>
    @endsection
