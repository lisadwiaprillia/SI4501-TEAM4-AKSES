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
