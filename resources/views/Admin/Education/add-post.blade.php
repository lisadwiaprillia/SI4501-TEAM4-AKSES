@extends(Session::has('isAuthorize') ? 'src.Admin.Template.main-template' : 'src.Template.main-template')

@section('title', 'Data Edukasi')
@section('education', 'active')

@section('content')

    <main>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    Tambah Data Bacaan
                </div>
                <form action="{{ url('/add/posts') }}" method="POST" class="px-5 py-5">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul Postingan</label>
                        <input type="text" value="{{ old('post_title') }}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="post_title" required>
                        @error('post_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Postingan</label>
                        <input type="text" value="{{ old('post_slug') }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="post_slug" required>
                        @error('post_slug')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Isi Postingan</label>
                        <textarea class="form-control @error('post_body') is-invalid @enderror " name="post_body"
                            id="exampleFormControlTextarea1" rows="5" required></textarea>
                        @error('post_body')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori Konten</label>
                        <select class="form-control" name="category_id">
                            <option value="" selected disabled>Kategori Konten</option>
                            @foreach ($Categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{ session('user_id') }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="user_id" required>
                    </div>

                    <a href="/educational" class="btn btn-primary mt-5 mr-3 back-btn">Kembali</a>

                    <button type="submit" name="submit" class="btn btn-primary submit-button ml-2 mt-5">Tambah</button>
                </form>
            </div>
        </div>
    </main>

@endsection
