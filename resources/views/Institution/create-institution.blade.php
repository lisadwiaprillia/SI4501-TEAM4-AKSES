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
            @if (Session::has('ticket-request-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('ticket-request-success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-capitalize">
                    formulir Pengajuan Verifikasi Institusi Kesehatan
                </div>
                <form action="/health-institution" method="POST" class="px-5 py-5" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Institusi</label>
                        <input type="text" placeholder="Contoh: Apotek Karya Medika" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kontak Aktif</label>
                        <input type="text" placeholder="Contoh: 081234567891" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_phone" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Institusi</label>
                        <textarea class="form-control"
                            placeholder="Contoh: Jl. Raya Narogong No.KM. 11, RT.002/RW.010, Bantargebang, Kec. Bantar Gebang, Kota Bks, Jawa Barat 1715"
                            name="institution_address" id="exampleFormControlTextarea1" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pemilik Institusi</label>
                        <input type="text" placeholder="Contoh: John Doe" class="form-control"
                            name="institution_chairman" id="exampleFormControlTextarea1" rows="5" required />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bukti Kepemilikan Institusi Kesehatan</label>
                        <input type="file" multiple class="form-control" name="institution_evidence"
                            id="exampleFormControlTextarea1" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Ajukan
                        Verifikasi</button>
                </form>
            </div>
        </div>
    </main>
@endsection
