@extends('src.Admin.Template.main-template')
@section('drug-regulation', 'active')

@section('title', 'Kategori Regulasi')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #019F90; color: white;">
                    <h4 class="mb-0">Tambah Regulasi Baru</h4>
                </div>

                <div class="card-body">
                    <form id="regulatoryForm" action="{{ route('Admin.Drugs.showRegulatory') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="form-label">Nama Regulasi</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <form class="form-group mt-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="desc" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group mt-4">
                                <button type="submit" class="btn" style="background-color: #019F90; color: white;">Simpan</button>
                                <a href="{{ route('Admin.Drugs.listRegulatory') }}" class="btn btn-secondary">Kembali ⬅️</a>
                            </div>
</form>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('regulatoryForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Hindari pengiriman formulir

        // Kirim data ke server menggunakan AJAX
        var formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Tampilkan SweetAlert2 popup
            Swal.fire({
                title: data.status == 'success' ? 'Sukses!' : 'Error!',
                text: data.message,
                icon: data.status,
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.isConfirmed && data.status == 'success') {
                    // Redirect pengguna ke halaman list/categories
                    window.location.href = "{{ route('Admin.Drugs.listRegulatory') }}";
                }
            });
        })
        .catch(error => console.error('Error:', error));
    });
</script>

@endsection
