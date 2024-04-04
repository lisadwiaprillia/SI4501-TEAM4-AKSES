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
        @if(Session::has('ticket-request-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('ticket-request-success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header text-capitalize">
                formulir Pengajuan Verifikasi Institusi Kesehatan 
            </div>
            <form action="" method="POST" class="px-5 py-5" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Tiket</label>
                    <input type="text" value="{{Session::get('resultData')['ticket']}}" class="form-control fw-bold" id="exampleInputEmail1" aria-describedby="emailHelp"  disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Institusi</label>
                    <input type="text" value="{{Session::get('resultData')['institution_name']}}" placeholder="Contoh: Apotek Karya Medika" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Institusi</label>
                    <input type="text" value="{{Session::get('resultData')['institution_address']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Kontak Aktif</label>
                    <input type="text" value="{{Session::get('resultData')['institution_phone']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_phone" disabled>
                </div>
                <a href="{{route('institution')}}" class="btn btn-primary mt-5 mr-3 back-btn">Kembali</a>
            </form>
        </div>
    </div>
</main>
@endsection