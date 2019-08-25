<div class="modal post-modal">
    <div class="modal-background"></div>
    <div class="modal-close" aria-label="close"></div>
    <div class="modal-content">
        <article class="message is-tan">
            <div class="message-header">
              <p>Confirm</p>
            </div>
            <div class="message-body">Delete post?
                <div class="field">
                    <div class="control">    
                        <form class="control" action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                            @method('DELETE')
                                <div class="buttons is-right">
                                    <button class="button cancel" aria-label="close" onclick="event.preventDefault();">Cancel</button>
                                    <button class="button is-mocha" type="submit">
                                        <span class="icon">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                        <span>Delete Post</span>
                                    </button>
                                </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </div>  
</div>