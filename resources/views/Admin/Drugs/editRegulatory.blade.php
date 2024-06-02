@extends('src.Admin.Template.main-template')
@section('drug-regulation', 'active')

@section('title', 'Edit Regulasi')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #019F90; color: white;">
                    <h4 class="mb-0">Edit Regulasi</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('Admin.Drugs.updateRegulatoryData', $regulatory->regulatory_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="form-label">Nama Regulasi</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $regulatory->regulatory_name }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ $regulatory->regulatory_desc }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('Admin.Drugs.listRegulatory') }}" class="btn btn-secondary">Batal</a>
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
    document.getElementById('deleteRegulatory').addEventListener('click', function() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus {{ $regulatory->regulatory_name }}?',
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
                    title: '{{ $regulatory->regulatory_name }} berhasil dihapus!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    // Redirect ke halaman semula setelah animasi selesai
                    window.location.href = "{{ route('Admin.Drugs.listRegulatory') }}";
                });
            }
        });
    });
</script>
@endsection
