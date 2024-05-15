<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('institution', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <main>
            <div class="container mt-5">
                @if (Session::has('fail-to-update-role'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('fail-to-update-role') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-capitalize">
                        formulir Perubahan Data Pegawai Kesehatan
                    </div>
                    <form action="{{ url('/health-staff/' . $staff->user_id . '/update') }}"
                        method="PATCH" class="px-5 py-5" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pegawai</label>
                            <input type="text" value="{{ $staff->name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_ticket_code" required
                                maxlength="21" minlength="21">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Pegawai</label>
                            <input type="text" value="{{ $staff->user_email }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Telepon Pegawai</label>
                            <input type="text" value="{{ $staff->user_phone }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_phone" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Pegawai</label>
                            <input type="text" value="{{ $staff->user_address }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_address" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bukti Sebagai Pegawai Kesehatan</label>
                            <input type="file" value="{{ $staff->user_evidence }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_evidence">
                        </div>
                        <a type="button" class="btn mt-3 mr-2 back-btn"
                            href="{{ url('/health-institution') }}">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary submit-button mt-3" onclick="window.location.href='/health-staff'">Edit</button>
                    </form>
                </div>
            </div>
        </main>
    @endsection
