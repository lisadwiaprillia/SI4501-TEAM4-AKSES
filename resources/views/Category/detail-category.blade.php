@extends('src.Admin.Template.main-template')

@section('title', 'Detail Data Kategori')
@section('category', 'active')

@section('content')

    <main>
        <div class="container mt-5">
            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6>Detail Data Kategori {{ $category->category_name }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Kategori</th>
                                <td>:</td>
                                <td>
                                    {{ $category->category_name }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Deskripsi Kategori</th>
                                <td>:</td>
                                <td>
                                    {{ $category->category_desc }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Dibuat Pada</th>
                                <td>:</td>
                                <td>
                                    {{ $category->created_at->format('d M Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Diubah Pada</th>
                                <td>:</td>
                                <td>
                                    {{ $category->updated_at->format('d M Y') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a type="button" class="btn mt-5 mx-3 my-3 back-btn" href="{{ url('/categories') }}">Kembali</a>
                </div>
            </div>
    </main>

@endsection
