@extends('src.Admin.Template.main-template')
@section('drug-presentation', 'active')
@section('title', 'Presentasi Obat')
@section('content')
    <main>
        <main>
            <div class="container mt-5">
                <main>
                    <div class="container">

                        @if (Session::has('success-to-delete-drug-presentation'))
                            <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
                                {{ Session::get('success-to-delete-drug-presentation') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('success-to-update-drug-presentation'))
                            <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                                {{ Session::get('success-to-update-drug-presentation') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <p class="mt-5 ml-3 fw-bold fs-3 text-capitalize">manajemen Presentasi obat</p>
                        <a href="{{ url('/drugs/create-drug=presentation') }}"
                            class="btn btn-primary ml-3 medicine-add-btn">Buat
                            Presentasi Obat</a>
                        <div class="container mt-4">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="row">No</th>
                                            <th scope="row">Sediaan </th>
                                            <th scope="row">Sediaan dan Harga</th>
                                            <th scope="row">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($drugs_presentations as $drug_presentation)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $drug_presentation->form }}</td>
                                                <td>{{ $drug_presentation->packaging_and_price }}</td>
                                                <td>
                                                    <a href="{{ url('/drug/presentations/' . $drug_presentation->presentation_id) }}"
                                                        class="btn btn-primary back-btn mr-2">Detail</a>

                                                    <a href="{{ url('/drugs/' . $drug_presentation->presentation_id . '/edit-presentation') }}"
                                                        class="btn btn-success mr-2">Edit</a>

                                                    <form class="d-inline"
                                                        action="{{ url('/drugs/' . $drug_presentation->presentation_id . '/delete') }}"
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
