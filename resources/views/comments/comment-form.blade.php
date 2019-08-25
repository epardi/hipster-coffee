<form name="comment" action="{{ route('comments.store', ['postId' => $post->id]) }}" class="control" method="POST">
    <div class="field">
        <div class="control">
            <textarea rows="8" name="body" class="textarea" @if (!auth()->user()) disabled @endif placeholder="{{ auth()->user() !== null ? 'Leave a comment...' : 'Login or register to leave a comment...' }}" value="{{ old('body') }}"></textarea>
            <p class="help is-mocha">{{ $errors->first('body') }}</p>
        </div>
        <div class="control">
            <button class="button is-pulled-right is-primary" @if (!auth()->user()) disabled @endif type="submit">SUBMIT</button>
        </div>
    </div>
    @csrf
</form>  