<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('institution', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <main>
            <div class="container mt-5">
                @if (Session::has('fail-to-update-role'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('fail-to-update-role') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-capitalize">
                        formulir Perubahan Data Role
                    </div>
                    <form action="{{ url('/update-roles/' . $role->role_id . '/update') }}" method="POST" class="px-5 py-5"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Role</label>
                            <input type="text" value="{{ $role->role_name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="role_name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi Role</label>
                            <input type="text" value="{{ $role->role_desc }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="role_desc" required>
                        </div>
                        <a type="button" class="btn mt-3 mr-2 back-btn" href="{{ url('/roles') }}">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Edit</button>
                    </form>
                </div>
            </div>
        </main>
    @endsection
