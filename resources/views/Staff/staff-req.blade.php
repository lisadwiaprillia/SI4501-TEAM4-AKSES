<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('employee-request', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <div class="container mt-5">
            @if (Session::has('failed-to-found-ticket'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('failed-to-found-ticket') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('institution-not-valid'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('institution-not-valid') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-capitalize">
                    formulir Pengajuan Verifikasi Tenaga kesehatan
                </div>
                <form action="{{ url('/employee-request') }}" method="POST" class="px-5 py-5"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Tiket Institusi</label>
                        <input type="text" placeholder="Contoh: 3rk9rm5y6610c9d5d7510" class="form-control"
                            id="exampleInputEmail1" maxlength="21" minlength="21" aria-describedby="emailHelp"
                            name="institution_ticket_code" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Ajukan
                        Verifikasi</button>
                </form>
            </div>
        </div>
    </main>

@endsection
