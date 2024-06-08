<!-- resources/views/Citizen/Home/education-page.blade.php -->

@extends('src.Template.main-template')

@section('title', 'Akses')

@section('home', 'active')

@section('content')

<div class="container-fluid education-page mt-5 px-4">
    <div class="row justify-content-end">
        <div class="col-lg-9 mb-4">
            <div class="education-content bg-white p-4 rounded shadow-sm">
                <h1>Education Page</h1>
                <p>Ini adalah halaman untuk education page</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="comment-section bg-light p-4 rounded shadow-sm">
                <div class="head mb-3"><h4>Post a Comment</h4></div>
                <div><span id="comment">{{ $comments->count() }}</span> Comments</div>
                <div class="text mb-3"><p>We are happy to hear from you</p></div>
                <form id="commentForm" method="POST" action="{{ route('comment.store') }}">
                    @csrf
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
                                <button type="submit" class="btn btn-secondary" disabled id="publish">Publish</button>
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

    userComment.addEventListener("input", function(e) {
        if (!userComment.value) {
            publishBtn.setAttribute("disabled", "disabled");
            publishBtn.classList.remove("btn-primary");
        } else {
            publishBtn.removeAttribute("disabled");
            publishBtn.classList.add("btn-primary");
        }
    });
});
</script>

@endsection
