<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('roles', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <main>
            <div class="container mt-5">
                <main>
                    <div class="container">
                        <p class="mt-5 ml-3 fw-bold fs-3">Manajemen Role</p>
                        <a href="{{ url('/create-roles') }}" class="btn btn-primary ml-3 medicine-add-btn">Buat Role</a>
                        <div class="container mt-4">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="row">No</th>
                                            <th scope="row">Nama Role</th>
                                            <th scope="row">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $role->role_name }}</td>
                                                <td>
                                                    <a href="" class="btn btn-primary back-btn mr-2">Detail</a>
                                                    <form class="d-inline" action="" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-success mr-2" type="submit">Edit</button>
                                                    </form>

                                                    <form class="d-inline" action="" method="POST">
                                                        @csrf
                                                        @method('PATCH')
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
