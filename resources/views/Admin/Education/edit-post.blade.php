@extends(Session::has('isAuthorize') ? 'src.Admin.Template.main-template' : 'src.Template.main-template')

@section('title', 'Data Edukasi')
@section('education', 'active')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #019F90; color: white;">
                    <h4 class="mb-0">Edit Regulasi</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('Admin.Education.editPostData', $post->post_id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="post_title" class="form-label">Nama Judul</label>
                            <input type="text" name="post_title" id="post_title" class="form-control @error('post_title') is-invalid @enderror" value="{{ $post->post_title }}" required>

                            @error('post_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="post_slug" class="form-label">Deskripsi</label>
                            <input name="post_slug" id="post_slug" class="form-control @error('post_slug') is-invalid @enderror" rows="4" value="{{ $post->post_slug }}" required>

                            @error('post_slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="post_body" class="form-label">Isi Bacaan</label>
                            <textarea name="post_body" id="post_body" class="form-control @error('post_body') is-invalid @enderror" rows="4" required>{{ $post->post_body }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    

                        <div class="form-group">
                        <label for="exampleInputEmail1">Kategori Konten</label>
                        <select class="form-control" name="category_id">
                            <option value="{{''}}" selected disabled>Kategori Konten</option>
                            @foreach ($Categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }} </option>
                            @endforeach
                        </select>
                    </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('Admin.Education.detailPost', $post->post_id) }}" class="btn btn-secondary">Batal</a>
                            <button type="button" class="btn btn-danger" id="deletePostButton">Hapus</button>
                        </div>
                    </form>

                    <!-- Form untuk menghapus regulasi -->
                    <form id="deleteForm" action="{{ route('Admin.Education.deletePost', $post->post_id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('deletePostButton').addEventListener('click', function() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus {{ $post->post_title }}?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
                // Lakukan penghapusan data di sini
                Swal.fire({
                    title: '{{ $post->post_title }} berhasil dihapus!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    // Redirect ke halaman semula setelah animasi selesai
                    window.location.href = "{{ route('educational') }}";
                });
            }
        });
    });
</script>
@endsection