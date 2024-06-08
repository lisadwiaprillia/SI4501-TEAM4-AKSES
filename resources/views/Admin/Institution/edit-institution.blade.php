<!-- Import Template -->
@extends('src.Admin.Template.main-template')

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
                        formulir Perubahan Data Institusi
                    </div>
                    <form action="{{ url('/health-institution/' . $institution->institution_id . '/update') }}"
                        method="POST" class="px-5 py-5" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Tiket Institusi</label>
                            <input type="text" value="{{ $institution->institution_ticket_code }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_ticket_code" required
                                maxlength="21" minlength="21">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Institusi</label>
                            <input type="text" value="{{ $institution->institution_name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Telepon Institusi</label>
                            <input type="text" value="{{ $institution->institution_phone }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_phone" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Institusi</label>
                            <input type="text" value="{{ $institution->institution_address }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_address" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Institusi</label>
                            <input type="text" value="{{ $institution->institution_address }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_address" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pemilik Institusi</label>
                            <input type="text" value="{{ $institution->institution_chairman }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_chairman" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bukti Kepemilikan Institusi</label>
                            <input type="file" value="{{ asset('storage/' . $institution->institution_evidence) }}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="institution_evidence">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status Institusi</label>
                            <select name="institution_status" id="exampleInputEmail1" class="form-control">
                                @switch($institution->institution_status)
                                    @case('Pending')
                                        <option value="{{ $institution->institution_status }}" selected>
                                            {{ $institution->institution_status }}</option>
                                        <option value="Diterima">
                                            Diterima</option>
                                        <option value="Ditolak">
                                            Ditolak</option>
                                    @break

                                    @case('Diterima')
                                        <option selected value="{{ $institution->institution_status }}">
                                            {{ $institution->institution_status }}</option>
                                        <option value="Pending">
                                            Pending</option>
                                        <option value="Ditolak">
                                            Ditolak</option>
                                    @break

                                    @case('Ditolak')
                                        <option selected value="{{ $institution->institution_status }}">
                                            {{ $institution->institution_status }}</option>
                                        <option value="Pending">
                                            Pending</option>
                                        <option value="Diterima">
                                            Diterima</option>
                                    @break
                                @endswitch
                            </select>
                        </div>

                        <a type="button" class="btn mt-3 mr-2 back-btn"
                            href="{{ url('/health-institution') }}">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Edit</button>
                    </form>
                </div>
            </div>
        </main>
    @endsection
