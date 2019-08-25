<div class="modal comments-modal">
    <div class="modal-background">
    </div>
    <div class="modal-close" aria-label="close"></div>
    <div class="modal-content">
        <article class="message is-tan">
            <div class="message-header">
              <p>Confirm</p>
            </div>
            <div class="message-body">
                <div class="field">
                    <div class="control">    
                        <div class="buttons is-right">
                            <button class="button cancel" aria-label="close">Cancel</button>
                            <button class="button is-mocha" onclick="
                                if (document.getElementById('users').checked) {
                                    document.getElementById('delete-user-comments').submit();
                                } else {
                                    document.forms.namedItem('delete-comments').submit();
                                }
                            ">
                            <span class="icon">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                            <span>Delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>  
</div>