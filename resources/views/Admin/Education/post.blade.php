@extends(Session::has('isAuthorize') ? 'src.Admin.Template.main-template' : 'src.Template.main-template')

@section('title', 'Data Edukasi')
@section('education', 'active')

@section('content')

    <main>
        <div class="container">
            <div class="container mt-3">
                @if (session()->has('postSuccessMessage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('postSuccessMessage') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('postDeleted'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('postDeleted') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Add Medicine Button -->
                <a href="{{ url('/add/posts') }}" class="btn btn-primary mt-5 medicine-add-btn">+ Tambah Data
                    Bacaan</a>

                <div class="row grid row-gap-3 col-gap-3 mt-4">
                    @foreach ($posts as $post)
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-capitalize">
                                        {{ $post->post_title }}
                                    </h5>
                                    <p class="card-text">
                                        <small class="text-capitalize text-muted d-block">By {{ $post->user ? $post->user->name : 'Unknown User' }}</small>
                                    </p>
                                    <p class="card-text">
                                    <small class="text-capitalize text-muted d-block">Posted: {{ \Carbon\Carbon::parse($post->created_at)->format('j F Y') }}</small>
                                    </p>
                                    <a href="{{ route('Admin.Education.detailPost', ['post_id' => $post->post_id]) }}" class="card-link d-block"
                                        style="color: #019F90;">Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>


@endsection
