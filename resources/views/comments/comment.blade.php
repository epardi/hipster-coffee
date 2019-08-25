<div class="{{ session('commentId') == $comment->id ? 'content comment-content error' : 'content comment-content' }}">
    <div class="level is-mobile">
        <div class="level-left">
            <p class="level-item">{{ $comment->name }}</p>
        </div>
        <div class="level-right">
            <div class="level-item control">
                <div class="buttons is-grouped">
                    <button class="button reply is-uppercase">Reply</button>
                    @can ('update', $comment)
                        <a class="button is-frappe" href="{{ route('comments.edit', ['postId' => $post->id, 'commentId' => $comment->id]) }}">
                            <span class="icon">
                                <i class="far fa-edit"></i>
                            </span>
                            <span>Edit</span>
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>                              
    <div class="control is-flex justify-flex-end">
        @can ('delete', $comment)
            <input id="delete-comment-checkbox-{{ $comment->id }}" name="delete-comment-checkbox" class="is-checkradio is-danger" type="checkbox">
            <label for="delete-comment-checkbox-{{ $comment->id }}">
                Mark for deletion
            </label>
         @endcan
    </div>                               
    <div class="level is-mobile">
        <div class="level-left">
            <span class="level-item is-italic">{{ date('F j, Y', strtotime($comment->published_at)) }}</span>
        </div>
    </div>                              
    <p>{{ $comment->body }}</p>                              
</div>