@extends('src.Template.main-template')

@section('title', 'Daftar Regulasi')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #019F90; color: white;">
                    <h4 class="mb-0">Daftar Regulasi</h4>
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
                                <th>Nama Regulasi</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($regulatories as $index => $regulatory)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $regulatory->regulatory_name }}</td>
                                <td>{{ $regulatory->regulatory_desc }}</td>
                                <td>
                                    <a href="{{ route('drugs.editRegulatoryForm', $regulatory->regulatory_id) }}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                    <a href="{{ route('Admin.Drugs.showRegulatory') }}" class="btn btn-secondary">Tambah Regulasi</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection