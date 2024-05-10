@extends('src.Admin.Template.main-template')
@section('drug-classes', 'active')
@section('title', 'Detail Kelas Obat')
@section('content')

<main>
    <div class="container mt-5">
        @if (Session::has('success-to-update-drug-class'))
            <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                {{ Session::get('success-to-update-drug-class') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card mx-auto" style="width: 60vw;">
            <div class="card-header text-center">
                <h6>Detail Data Kelas Obat {{ $drug_class->class_name }}</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Nama Kelas Obat</th>
                            <td>:</td>
                            <td>
                                {{ $drug_class->class_name }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Deskripsi Kelas Obat</th>
                            <td>:</td>
                            <td>
                                {{ $drug_class->class_desc }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Dibuat Pada</th>
                            <td>:</td>
                            <td>
                                {{ $drug_class->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Diubah Pada</th>
                            <td>:</td>
                            <td>
                                {{ $drug_class->updated_at->format('d M Y') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a type="button" class="btn mt-5 mx-3 my-3 back-btn" href="{{ url('/drugs/classes') }}">Kembali</a>
            </div>
        </div>
</main>

@endsection