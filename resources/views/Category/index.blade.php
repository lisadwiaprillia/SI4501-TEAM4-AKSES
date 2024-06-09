@extends('src.Admin.Template.main-template')

@section('title', 'Daftar Kategori')

@section('category', 'active')

@section('content')

    <main>
        <div class="container mt-5">
            <main>
                <div class="container">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <p class="mt-5 ml-3 fw-bold fs-3">Manajemen Kategori Edukasi</p>
                    <a href="{{ url('/categories/create') }}" class="btn btn-primary ml-3 medicine-add-btn">Buat
                        Kategori Edukasi</a>
                    <div class="container mt-4">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="row">No</th>
                                        <th scope="row">Nama Kategori</th>
                                        <th scope="row">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>

                                                <a href="{{ url('/categories/' . $category->category_id) }}"
                                                    class="btn btn-primary back-btn mr-2">Detail</a>

                                                <a href="{{ url('/categories/edit/' . $category->category_id) }}"
                                                    class="btn btn-success mr-2">Edit</a>

                                                <form class="d-inline"
                                                    action="{{ url('categories/' . $category->category_id . '/delete') }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger mr-2" type="submit">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </main>

@endsection
