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
                <form action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="post_title">Judul Post</label>
                        <input type="text" class="form-control" id="post_title" name="post_title"
                            value="{{ old('post_title', $post->post_title ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="post_body">Isi Post</label>
                        <textarea class="form-control" id="body-editor" name="post_body" required>{{ old('post_body', $post->post_body ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="{{ $post->categories->category_id }}" selected>
                                {{ $post->categories->category_name }}</option>

                            @foreach ($categories as $category)
                                @if ($post->categories->category_name === $category->category_name)
                                    @continue
                                @else
                                    <option value="{{ $category->category_id }}">
                                        {{ $category->category_name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <a href="{{ url('/education') }}" class="btn btn-primary mt-3 mr-3 back-btn">Kembali</a>

                    <button type="submit" class="btn btn-primary submit-button mt-3">Edit Data Post</button>
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
