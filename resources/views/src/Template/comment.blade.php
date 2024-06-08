<!-- resources/views/src/Template/comment.blade.php -->

<div id="comment-{{ $comment->id }}" class="parents mb-3 p-2 bg-white rounded shadow-sm">
    <div class="d-flex align-items-center">
        <img src="{{ $comment->username == 'Anonymous' ? asset('img/anonymous.png') : asset('img/user.png') }}" class="comment-avatar rounded-circle mr-2">
        <h6 class="m-0">{{ $comment->username }}</h6>
    </div>
    <p>{{ $comment->message }}</p>
    <div class="engagements mb-2">
        <img src="{{ asset('img/reply.png') }}" alt="Reply" class="mr-2 engagement-icon reply-btn" data-comment-id="{{ $comment->id }}">
        <img src="{{ asset('img/edit.png') }}" alt="Edit" class="engagement-icon edit-btn" data-comment-id="{{ $comment->id }}">
        <form method="POST" action="{{ route('comment.destroy', $comment) }}" class="d-inline delete-form" data-comment-id="{{ $comment->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline delete-btn">
                <img src="{{ asset('img/delete.png') }}" alt="Delete" class="engagement-icon">
            </button>
        </form>
    </div>
    <small class="date text-muted">{{ $comment->created_at->format('Y-m-d H:i:s') }}</small>

    @if($comment->replies)
        <div class="ml-4 mt-3">
            @foreach($comment->replies as $reply)
                @include('src.Template.comment', ['comment' => $reply])
            @endforeach
        </div>
    @endif

    <!-- Container for dynamically added reply form -->
    <div class="reply-form-container"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.reply-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const replyFormContainer = document.querySelector(`#comment-${commentId} .reply-form-container`);

            if (!replyFormContainer.querySelector('form')) {
                const replyForm = document.createElement('form');
                replyForm.method = 'POST';
                replyForm.action = '{{ route("comment.store") }}';

                const csrfField = document.createElement('input');
                csrfField.type = 'hidden';
                csrfField.name = '_token';
                csrfField.value = '{{ csrf_token() }}';

                const parentIdField = document.createElement('input');
                parentIdField.type = 'hidden';
                parentIdField.name = 'parent_id';
                parentIdField.value = commentId;

                const usernameField = document.createElement('input');
                usernameField.type = 'text';
                usernameField.name = 'username';
                usernameField.value = 'Anonymous';
                usernameField.className = 'form-control mb-2 user';

                const messageField = document.createElement('input');
                messageField.type = 'text';
                messageField.name = 'message';
                messageField.placeholder = 'Enter comment';
                messageField.className = 'form-control usercomment';

                const submitButton = document.createElement('button');
                submitButton.type = 'submit';
                submitButton.className = 'btn btn-primary btn-sm mt-2 float-right';
                submitButton.innerText = 'Reply';

                replyForm.appendChild(csrfField);
                replyForm.appendChild(parentIdField);
                replyForm.appendChild(usernameField);
                replyForm.appendChild(messageField);
                replyForm.appendChild(submitButton);

                replyFormContainer.appendChild(replyForm);

                // Add margin to the bottom of the reply form to create space
                replyFormContainer.style.marginBottom = '15px';
            }
        });
    });

    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const commentMessage = document.querySelector(`#comment-${commentId} p`).innerText;

            const editForm = document.createElement('form');
            editForm.method = 'POST';
            editForm.action = `/comment/${commentId}`;

            const csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = '{{ csrf_token() }}';

            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'PATCH';

            const messageField = document.createElement('input');
            messageField.type = 'text';
            messageField.name = 'message';
            messageField.value = commentMessage;
            messageField.className = 'form-control mb-2';

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

<style>

</style>
