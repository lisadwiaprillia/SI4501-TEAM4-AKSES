@extends('src.Admin.Template.main-template')
@section('drug-data', 'active')
@section('title', 'Data Obat')
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
                    <h6>Detail Data Obat {{ $drugs_data->form }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">No</th>
                                <td>:</td>
                                <td>
                                    {{ $drugs_data->form }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Obat</th>
                                <td>:</td>
                                <td>
                                    {{ $drugs_data->packaging_and_price }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Dibuat Pada</th>
                                <td>:</td>
                                <td>
                                    {{ $drugs_data->created_at->format('d M Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Diubah Pada</th>
                                <td>:</td>
                                <td>
                                    {{ $drugs_data->updated_at->format('d M Y') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a type="button" class="btn mt-5 mx-3 my-3 back-btn"
                        href="{{ url('/drug/data') }}">Kembali</a>
                </div>
            </div>
    </main>

@endsection
