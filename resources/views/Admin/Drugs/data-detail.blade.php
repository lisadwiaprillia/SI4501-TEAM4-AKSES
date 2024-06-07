@extends('src.Admin.Template.main-template')
@section('drug-data', 'active')
@section('title', 'Detail Data Obat')
@section('content')
    <main>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header mt-2">
                    <h3>Detail Data Obat {{ $drug_data->drug_name }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Obat</th>
                                <td>{{ $drug_data->drug_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kandungan</th>
                                <td>{{ $drug_data->contents }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Indikasi/ Dipakai Untuk</th>
                                <td>{{ $drug_data->indications }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Dosis</th>
                                <td>{{ $drug_data->dosage }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kontraindikasi</th>
                                <td>{{ $drug_data->contraindication }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Pencegahan Khusus</th>
                                <td>{{ $drug_data->special_precautions }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Interaksi Obat</th>
                                <td>{{ $drug_data->drug_interaction }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Reaksi merugikan</th>
                                <td>{{ $drug_data->adverse_reactions }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Anatomical Therapeutic Chemical</th>
                                <td>{{ $drug_data->atc_classification }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Klasifikasi Obat</th>
                                <td>{{ $drug_data->drug_class->class_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Sediaan Obat</th>
                                <td>{{ $drug_data->drug_presentation->form }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Regulasi Obat</th>
                                <td>{{ $drug_data->drug_regulatory->regulatory_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Dibuat Pada</th>
                                <td>{{ $drug_data->created_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">DiUpdate Pada</th>
                                <td>{{ $drug_data->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ url('/drug/data') }}" class="btn btn-primary mt-3 mr-3 back-btn">Kembali</a>
                </div>
            </div>
        </div>
    </main>
@endsection
