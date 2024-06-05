@extends('src.Admin.Template.main-template')
@section('drug-data', 'active')
@section('title', 'Data Obat')
@section('content')
    <main>
        <main>
            <div class="container mt-5">
                <main>
                    <div class="container">

                        @if (Session::has('success-to-delete-drug-data'))
                            <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
                                {{ Session::get('success-to-delete-drug-data') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('success-to-update-drug-data'))
                            <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                                {{ Session::get('success-to-update-drug-data') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <p class="mt-5 ml-3 fw-bold fs-3 text-capitalize">manajemen Data obat</p>
                        <a href="{{ url('/drugs/create-drug=data') }}"
                            class="btn btn-primary ml-3 medicine-add-btn">Buat
                            Data Obat</a>
                        <div class="container mt-4">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="row">ID Obat</th>
                                            <th scope="row">Konten </th>
                                            <th scope="row">Indikasi</th>
                                            <th scope="row">Reaksi</th>
                                            <th scope="row">Klasifikasi</th>
                                            <th scope="row">Peringatan</th>
                                            <th scope="row">Kontradiksi</th>
                                            <th scope="row">Dosis</th>
                                            <th scope="row">Interaksi</th>
                                            <th scope="row">Regulasi</th>
                                            <th scope="row">Kategori Obat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($drugs_data as $drug_data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $drug_data->form }}</td>
                                                <td>{{ $drug_data->packaging_and_price }}</td>
                                                <td>
                                                    <a href="{{ url('/drug/data/' . $drug_data->data_id) }}"
                                                        class="btn btn-primary back-btn mr-2">Detail</a>

                                                    <a href="{{ url('/drugs/' . $drug_data->data_id . '/edit-data') }}"
                                                        class="btn btn-success mr-2">Edit</a>

                                                    <form class="d-inline"
                                                        action="{{ url('/drugs/' . $drug_data->data_id . '/delete') }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger mr-2" type="submit">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </main>

    @endsection
