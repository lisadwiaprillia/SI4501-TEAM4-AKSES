<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('institution', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">
            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6>Detail Data Institusi {{ $institution->institution_name }}</h6>
                </div>
                <div class="table-responsive">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">No Telepon Institusi</th>
                                    <td>:</td>
                                    <td>
                                        {{ $institution->institution_phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat Institusi</th>
                                    <td>:</td>
                                    <td>
                                        {{ $institution->institution_address }}
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Pemilik Institusi</th>
                                    <td>:</td>
                                    <td>
                                        {{ $institution->institution_chairman }}
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Bukti Kepemilikan Institusi</th>
                                    <td>:</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $institution->institution_evidence) }}" alt="Bukti Kepemilikan Institusi"
                                            style="max-width: 200px;">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Status Institusi</th>
                                    <td>:</td>
                                    <td class="fw-bold text-uppercase">
                                        {{ $institution->institution_status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Kode Tiket Institusi</th>
                                    <td>:</td>
                                    <td>
                                        {{ $institution->institution_ticket_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Dibuat Pada</th>
                                    <td>:</td>
                                    <td>
                                        {{ $institution->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Diubah Pada</th>
                                    <td>:</td>
                                    <td>
                                        {{ $institution->updated_at->format('d M Y') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a type="button" class="btn mt-5 mx-3 my-3 back-btn"
                            href="{{ url('/health-institution') }}">Kembali</a>
                    </form>
                </div>
            </div>
    </main>
@endsection
