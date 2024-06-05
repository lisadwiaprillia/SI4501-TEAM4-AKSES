@extends('src.Admin.Template.main-template')
@section('drug-data', 'active')
@section('title', 'Detail Data Obat')
@section('content')
    <main>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Data Obat</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">ID Obat</th>
                                <td>{{ $drug_data->data_id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Konten</th>
                                <td>{{ $drug_data->form }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Indikasi</th>
                                <td>{{ $drug_data->indication }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Reaksi</th>
                                <td>{{ $drug_data->reaction }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Klasifikasi</th>
                                <td>{{ $drug_data->classification }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Peringatan</th>
                                <td>{{ $drug_data->warning }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kontradiksi</th>
                                <td>{{ $drug_data->contraindication }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Dosis</th>
                                <td>{{ $drug_data->dosage }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Interaksi</th>
                                <td>{{ $drug_data->interaction }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Regulasi</th>
                                <td>{{ $drug_data->regulation }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori Obat</th>
                                <td>{{ $drug_data->category }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ url('/drugs') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </main>
@endsection
