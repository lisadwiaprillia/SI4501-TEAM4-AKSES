@extends(Session::has('isAuthorize') ? 'src.Admin.Template.main-template' : 'src.Template.main-template')

@section('title', 'Data Edukasi')
@section('education', 'active')

@section('content')

    <div class="container mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h3 class="text-capitalize">Manajemen Data Edukasi</h3>

        @if (Session::has('isAuthorize'))
            <a href="{{ url('/create-post') }}" class="btn btn-primary mt-3  medicine-add-btn">Buat
                Data Edukasi</a>
        @endif
        <div class="row mt-4">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->post_title }}</h5>
                            <small class="text-capitalize card-title font-size-sm gray-200">Posted:
                                {{ $post->formatted_date }} ago</small>
                            <br>
                            <small class="text-capitalize card-title font-size-sm gray-200">Author:
                                {{ $post->user->name }}</small>
                            <p class="card-text mt-3">{!! Str::limit($post->post_body, 100) !!}</p>
                        </div>
                        <div class="card-body mr-2">

                            <a href="{{ url('/education/' . $post->post_id) }}" class="card-link">Baca Selengkapnya</a>

                            @if (Session::get('isAdmin') === true)
                                <a href="{{ url('/education/edit/' . $post->post_id) }}"
                                    class="btn btn-success mr-2">Edit</a>

                                <form class="d-inline" action="{{ url('/education/delete/' . $post->post_id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mr-2" type="submit">Hapus</button>
                                </form>
                            @endif

                            @if (Session::get('user_id') === $post->user->user_id && Session::get('isAdmin') === false)
                                <a href="{{ url('/education/edit/' . $post->post_id) }}"
                                    class="btn btn-success mr-2">Edit</a>

                                <form class="d-inline" action="{{ url('/education/delete/' . $post->post_id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mr-2" type="submit">Hapus</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
