@extends('src.Template.main-template')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #019F90; color: white;">
                    <h4 class="mb-0">Edit Kategori</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('categories.updateCategoryData', $category->category_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->category_name }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ $category->category_desc }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('categories.listCategories') }}" class="btn btn-secondary">Batal</a>
                            <button type="button" class="btn btn-danger" id="deleteCategory">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('deleteCategory').addEventListener('click', function() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus {{ $category->category_name }}?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan penghapusan data di sini
                Swal.fire({
                    title: '{{ $category->category_name }} berhasil dihapus!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    // Redirect ke halaman semula setelah animasi selesai
                    window.location.href = "{{ route('categories.listCategories') }}";
                });
            }
        });
    });
</script>
@endsection
