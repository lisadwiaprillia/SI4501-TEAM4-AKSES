<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('institution', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">
            @if (Session::has('success-to-update-role'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success-to-update-role') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6>Detail Data Role {{ $role->role_name }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Role</th>
                                <td>:</td>
                                <td>
                                    {{ $role->role_name }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Deskripsi Role</th>
                                <td>:</td>
                                <td>
                                    {{ $role->role_desc }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Dibuat Pada</th>
                                <td>:</td>
                                <td>
                                    {{ $role->created_at->format('d M Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Diubah Pada</th>
                                <td>:</td>
                                <td>
                                    {{ $role->updated_at->format('d M Y') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a type="button" class="btn mt-5 mx-3 my-3 back-btn" href="{{ url('/roles') }}">Kembali</a>
                </div>
            </div>
    </main>
@endsection
