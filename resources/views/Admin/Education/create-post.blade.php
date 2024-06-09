@extends('src.Admin.Template.main-template')

@section('title', 'Data Edukasi')
@section('education', 'active')

@section('content')

    <div class="container">
        <div class="card mt-4">
            <div class="card-header mt-2 text-capitalize">
                <h3>Form Pembuatan Data Post</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/send-post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="post_title">Judul Post</label>
                        <input type="text" class="form-control" id="post_title" name="post_title" required>
                    </div>

                    <div class="form-group">
                        <label for="post_body">Isi Post</label>
                        <textarea class="form-control" id="body-editor" name="post_body"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="" disable selected>Pilih Salah Satu Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <a href="{{ url('/education') }}" class="btn btn-primary mt-3 mr-3 back-btn">Kembali</a>

                    <button type="submit" class="btn btn-primary submit-button mt-3">Buat Data Post</button>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#body-editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
