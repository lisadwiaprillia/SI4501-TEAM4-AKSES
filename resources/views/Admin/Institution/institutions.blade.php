<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('check', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <div class="container mt-5">
            <div class="container">

                @if (Session::has('success-to-delete-institution'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success-to-delete-institution') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('success-to-update-institution'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success-to-update-institution') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <p class="mt-5 ml-3 fw-bold fs-3">Manajemen Data Institusi Kesehatan</p>

                <div class="container mt-4">
                    @livewire('institution-status')
                </div>
            </div>
        </div>
    </main>

@endsection
