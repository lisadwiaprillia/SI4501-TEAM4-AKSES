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
                    <h6>Detail Data Pegawai</h6>
                </div>
                <div class="table-responsive">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Pegawai</th>
                                    <td>:</td>
                                    <td>
                                        {{ $staff->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Email Pegawai</th>
                                    <td>:</td>
                                    <td>
                                        {{ $staff->user_email }}
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">No HP Pegawai</th>
                                    <td>:</td>
                                    <td>
                                        {{ $staff->user_phone }}
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Alamat Pegawai</th>
                                    <td>:</td>
                                    <td>
                                        {{ $staff->user_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Dibuat Pada</th>
                                    <td>:</td>
                                    <td>
                                        {{ $staff->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Diubah Pada</th>
                                    <td>:</td>
                                    <td>
                                        {{ $staff->updated_at->format('d M Y') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a type="button" class="btn mt-5 mx-3 my-3 back-btn"
                            href="{{ url('/health-staff') }}">Kembali</a>
                    </form>
                </div>
            </div>
    </main>
@endsection
