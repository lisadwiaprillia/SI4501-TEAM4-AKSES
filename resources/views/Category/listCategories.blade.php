@extends('src.Admin.Template.main-template')

@section('title', 'Daftar Kategori')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #019F90; color: white;">
                        <h4 class="mb-0">Daftar Kategori</h4>
                    </div>

                    <div class="card-body">
                        @if (Session::has('success-to-create-category'))
                            <div class="alert alert-success">
                                {{ Session::get('success-to-create-category') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->category_desc }}</td>
                                        <td>
                                            <a href="{{ route('categories.editCategoryForm', $category->category_id) }}"
                                                class="btn btn-success">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <a href="{{ route('categories.showCategoryForm') }}" class="btn btn-secondary">Tambah Kategori</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
