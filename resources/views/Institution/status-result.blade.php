<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('check', 'active')

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
                Status Verifikasi Institusi Kesehatan 
            </div>
            <form action="" method="POST" class="px-5 py-5" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Institusi</label>
                    <input type="text" value="{{$institution->institution_name}}" placeholder="Contoh: Apotek Karya Medika" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Status Institusi</label>
                    <input type="text" value="{{$institution->institution_status}}" placeholder="Contoh: Apotek Karya Medika" class="form-control text-uppercase" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                </div>
                <a href="{{url('/health-institution/check-status')}}" class="btn btn-primary mt-5 mr-3 back-btn">Kembali</a>
            </form>
        </div>
    </div>
</main>
@endsection