@extends('src.Admin.Template.main-template')

@section('title', 'Kategori Konten')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #019F90; color: white;">
                        <h4 class="mb-0">Tambah Kategori Baru</h4>
                    </div>

                    <div class="card-body">
                        <form id="categoryForm" action="{{ route('categories.showCategoryForm') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="form-label">Nama Kategori</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                    rows="4" required>{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn"
                                    style="background-color: #019F90; color: white;">Simpan</button>
                                <a href="{{ route('categories.listCategories') }}" class="btn btn-secondary">Kembali ⬅️</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('categoryForm').addEventListener('submit', function(event) {
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
                            window.location.href = "{{ route('categories.listCategories') }}";
                        }
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    </script>

@endsection
