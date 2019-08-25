<form name="reply" action="{{ route('replies.store', ['postId' => $post->id, 'commentId' => $comment->id]) }}" class="control is-hidden has-margin-bottom-50" method="POST">                                                               
    <div class="field">
        <div class="control">
            <textarea rows="8" name="body" class="textarea" @if (!auth()->user()) disabled @endif placeholder="{{ auth()->user() !== null ? 'Leave a reply...' : 'Login or register to leave a reply...' }}" value="{{ old('body') }}"></textarea>
            <p class="help is-mocha">{{ session('commentId') == $comment->id ? $errors->first('body') : '' }}</p>
        </div>                                   
        <div class="control">
            <div class="buttons is-right">
                <button class="button cancel-reply">Cancel</button>
                <button class="button is-pulled-right is-primary" @if (!auth()->user()) disabled @endif type="submit">SUBMIT</button>
            </div>
        </div>
    </div>
    @csrf
</form>