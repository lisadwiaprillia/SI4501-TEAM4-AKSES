<div id="comment-{{ $comment->id }}" class="parents mb-3 p-2 bg-white rounded shadow-sm">
    <!-- Avatar dan Username -->
    <div class="d-flex align-items-center">
        <img src="{{ $comment->username == 'Anonymous'? asset('img/anonymous.png') : asset('img/user.png') }}" class="comment-avatar rounded-circle mr-2">
        <h6 class="m-0">{{ $comment->username }}</h6>
    </div>

    <!-- Pesan -->
    <p>{{ $comment->message }}</p>

    <!-- Tombol Balas, Edit, Hapus -->
    <!-- <div class="engagements mb-2">
        <img src="{{ asset('img/reply.png') }}" alt="Reply" class="mr-2 engagement-icon reply-btn" data-comment-id="{{ $comment->id }}">
        <img src="{{ asset('img/edit.png') }}" alt="Edit" class="mr-2 engagement-icon edit-btn" data-comment-id="{{ $comment->id }}">
        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" class="d-inline delete-form" data-comment-id="{{ $comment->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline delete-btn">
                <img src="{{ asset('img/delete.png') }}" alt="Delete" class="engagement-icon">
            </button>
        </form>
    </div> -->

    <!-- Tanggal Komentar -->
    <small class="date text-muted">{{ $comment->created_at->format('Y-m-d H:i:s') }}</small>

    <!-- Balasan Komentar -->
    @if($comment->replies)
        <div class="ml-4 mt-3">
            @foreach($comment->replies as $reply)
                @include('comments', ['comment' => $reply])
            @endforeach
        </div>
    @endif

    <!-- Tempat Form Balas -->
    <div class="reply-form-container"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tombol Balas
    document.querySelectorAll('.reply-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const replyFormContainer = document.querySelector(`#comment-${commentId}.reply-form-container`);

            if (!replyFormContainer.querySelector('form')) {
                const replyForm = document.createElement('form');
                replyForm.method = 'POST';
                replyForm.action = '{{ route("comments.store") }}';

                const csrfField = document.createElement('input');
                csrfField.type = 'hidden';
                csrfField.name = '_token';
                csrfField.value = '{{ csrf_token() }}';

                const parentIdField = document.createElement('input');
                parentIdField.type = 'hidden';
                parentIdField.name = 'parent_id';
                parentIdField.value = commentId;

                const postIdField = document.createElement('input');
                postIdField.type = 'hidden';
                postIdField.name = 'post_id';
                postIdField.value = '{{ $post->post_id }}';

                const usernameField = document.createElement('input');
                usernameField.type = 'text';
                usernameField.name = 'username';
                usernameField.value = 'Anonymous';
                usernameField.className = 'form-control mb-2';

                const messageField = document.createElement('textarea');
                messageField.name = 'message';
                messageField.placeholder = 'Enter comment';
                messageField.className = 'form-control mb-2';

                const submitButton = document.createElement('button');
                submitButton.type = 'submit';
                submitButton.className = 'btn btn-primary btn-sm mt-2 float-right';
                submitButton.innerText = 'Reply';

                replyForm.appendChild(csrfField);
                replyForm.appendChild(parentIdField);
                replyForm.appendChild(postIdField);
                replyForm.appendChild(usernameField);
                replyForm.appendChild(messageField);
                replyForm.appendChild(submitButton);

                replyFormContainer.appendChild(replyForm);

                // Tambahkan margin bawah untuk membuat ruang
                replyFormContainer.style.marginBottom = '15px';
            }
        });
    });

    // Tombol Edit
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const commentMessage = document.querySelector(`#comment-${commentId} p`).innerText;

            const editForm = document.createElement('form');
            editForm.method = 'POST';
            editForm.action = `/comments/${commentId}`;
            editForm.className = 'mt-3';

            const csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = '{{ csrf_token() }}';
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'PUT';

            const messageField = document.createElement('textarea');
            messageField.name = 'message';
            messageField.className = 'form-control mb-2';
            messageField.value = commentMessage;

            const submitButton = document.createElement('button');
            submitButton.type = 'submit';
            submitButton.className = 'btn btn-primary btn-sm float-right';
            submitButton.innerText = 'Update';

            editForm.appendChild(csrfField);
            editForm.appendChild(methodField);
            editForm.appendChild(messageField);
            editForm.appendChild(submitButton);

            document.querySelector(`#comment-${commentId} p`).replaceWith(editForm);
        });
    });

    // Tombol Hapus
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const commentId = this.closest('form').getAttribute('data-comment-id');
            if (confirm('Are you sure you want to delete this comment?')) {
                document.querySelector(`form.delete-form[data-comment-id="${commentId}"]`).submit();
            }
        });
    });
});
</script>