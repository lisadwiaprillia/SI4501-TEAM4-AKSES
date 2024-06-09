@extends('src.Template.main-template')

@section('title', 'Akses')

@section('content')
    <div class="container">
        <h1>Articles</h1>
        <div class="row gy-4 posts-list">
            @foreach ($articles as $article)
                <div class="col-xl-4 col-md-6">
                    <article>
                        <div class="post-img">
                            @if($article->cover_image)
                                <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" class="img-fluid">
                            @else
                                <img src="path/to/default/image.jpg" alt="Default Image" class="img-fluid">
                            @endif
                        </div>
                        <p class="post-category">Category</p>
                        <h2 class="title">
                            <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                        </h2>
                        <div class="d-flex align-items-center">
                            <img src="path/to/author/image.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author-list">{{ $article->author }}</p>
                                <p class="post-date">
                                    <time datetime="{{ $article->published_at }}">{{ $article->published_at->format('M d, Y') }}</time>
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        <div class="blog-pagination">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
