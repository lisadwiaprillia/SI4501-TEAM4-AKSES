<!-- Import Template -->
@extends('src.Admin.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('check', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <div class="container">
            @if (Session::has('accepting-request'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('accepting-request') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('rejecting-request'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('rejecting-request') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <p class="mt-5 fw-bold fs-3">Data Pengajuan Verifikasi</p>
            <div class="container mt-4">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="row">No</th>
                                <th scope="row">Nama Institusi</th>
                                <th scope="row">Tanggal Pengajuan</th>
                                <th scope="row">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($institutions as $institution)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $institution->institution_name }}
                                    </td>
                                    <td>{{ $institution->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ url('/health-institution/' . $institution->institution_id . '/details') }}"
                                            class="btn btn-primary back-btn mr-2">Detail</a>
                                        <form class="d-inline"
                                            action="{{ url('/verification-request/update-status/' . $institution->institution_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success mr-2" type="submit">Terima</button>
                                        </form>

                                        <form class="d-inline"
                                            action="{{ url('/verification-request/reject/' . $institution->institution_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger mr-2" type="submit">Tolak</button>
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
@endsection
