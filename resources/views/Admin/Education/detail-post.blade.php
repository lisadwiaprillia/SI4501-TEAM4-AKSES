@extends(Session::has('isAuthorize') ? 'src.Admin.Template.main-template' : 'src.Template.main-template')

@section('title', 'Data Edukasi')
@section('education', 'active')

@section('content')
<div class="container mt-5">
    <h3 class="text-capitalize">{{ $post->post_title }}</h3>
    <small class="text-capitalize text-muted d-block">Posted: {{ $post->formatted_date }} ago</small>
    <small class="text-capitalize text-muted d-block">Posted By: {{ $post->user->name }}</small>
    <small class="text-capitalize text-muted d-block">Category: {{ $post->categories->category_name }}</small>
    <p class="mt-3 post-body">{!! $post->post_body !!}</p>

    <button id="copyUrlButton" class="btn btn-primary mr-2">Share</button>
    <a href="{{ url('/education') }}">Kembali</a>
</div>

<div class="container mt-5">
    <div class="comment-section bg-light p-4 rounded shadow-sm">
        <div><span id="comment">{{ $comments->count() }}</span> Comments</div>
        <div class="text mb-3">
            <p>We are happy to hear from you</p>
        </div>

        <form id="commentForm" method="POST" action="{{ route('comments.store', $post->post_id) }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->post_id }}">
            <!-- rest of the form -->
        <!-- </form>
        <form id="commentForm" method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->post_id }}"> -->
            <div class="commentbox d-flex">
                <img src="{{ asset('img/user1.png') }}" alt="" class="comment-avatar rounded-circle mr-3">
                <div class="content w-100">
                    <h6>Comment as:</h6>
                    <input type="text" value="Anonymous" class="form-control mb-2 user" name="username">
                    <div class="commentinput mb-3">
                        <input type="text" placeholder="Enter comment" class="form-control usercomment" name="message">
                        <input type="hidden" name="parent_id" id="parent_id" value="">
                    </div>
                    <div class="buttons d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-secondary" id="publish">Publish</button>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input notifyinput" id="notifyCheck">
                            <label class="form-check-label" for="notifyCheck">Notify me</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <div class="comments mb-4">
            @foreach ($comments as $comment)
                @include('src.Template.comment', ['comment' => $comment])
            @endforeach
        </div>
    </div>
</div>

<style>
    .comment-avatar {
        width: 25px;
        height: 25px;
    }
    .engagement-icon {
        width: 20px;
        height: 20px;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const userComment = document.querySelector(".usercomment");
    const publishBtn = document.querySelector("#publish");

    userComment.addEventListener("input", function() {
        if (!userComment.value) {
            // publishBtn.setAttribute("disabled", "disabled");
            publishBtn.classList.remove("btn-primary");
        } else {
            // publishBtn.removeAttribute("disabled");
            publishBtn.classList.add("btn-primary");
        }
    });

    const copyUrlButton = document.getElementById('copyUrlButton');
    copyUrlButton.addEventListener('click', async function() {
        try {
            const url = window.location.href;
            await navigator.clipboard.writeText(url);
            alert('URL copied to clipboard: ' + url);
        } catch (err) {
            console.error('Failed to copy URL: ', err);
        }
    });
});
</script>
@endsection
