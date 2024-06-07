@extends('src.Admin.Template.main-template')
@section('drug-classes', 'active')
@section('title', 'Kelas Obat')
@section('content')
    <main>
        <main>
            <div class="container mt-5">
                <main>
                    <div class="container">
                        @if (Session::has('success-to-delete-role'))
                            <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                                {{ Session::get('success-to-delete-role') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('success-to-delete-drug-class'))
                            <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
                                {{ Session::get('success-to-delete-drug-class') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('fail-to-delete-drug-class'))
                            <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
                                {{ Session::get('fail-to-delete-drug-class') }}
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
                        <p class="mt-5 ml-3 fw-bold fs-3 text-capitalize">manajemen Klasifikasi obat</p>
                        <a href="{{ url('/drugs/class/create-form') }}" class="btn btn-primary ml-3 medicine-add-btn">Buat
                            Klasifikasi Obat</a>
                        <div class="container mt-4">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="row">No</th>
                                            <th scope="row">Nama Klasifikasi</th>
                                            <th scope="row">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($drug_classes as $drug_class)
                                            <tr>
                                                <td class="text-capitalize">{{ $loop->iteration }}</td>
                                                <td class="text-capitalize">{{ $drug_class->class_name }}</td>
                                                <td>
                                                    <a href="{{ url('/drug/class/' . $drug_class->class_id) }}"
                                                        class="btn btn-primary back-btn mr-2">Detail</a>

                                                    <a href="{{ url('/drugs/class/' . $drug_class->class_id . '/edit-form') }}"
                                                        class="btn btn-success mr-2">Edit</a>

                                                    <form class="d-inline"
                                                        action="{{ url('/drugs/classes/' . $drug_class->class_id . '/delete') }}"
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
