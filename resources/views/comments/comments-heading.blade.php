<div class="field level is-mobile">
    <div class="level-left">
        <div class="control level-item">
            <span class="is-size-3 has-text-weight-semibold is-uppercase">
                @if ($commentsCount)
                    {{ $commentsCount . ' ' }}
                @endif
                {{ $commentsCount == 1 ? 'Comment' : 'Comments' }}
            </span>
        </div>
        <div class="control level-item">
            <div id="sort-comments-dropdown" class="dropdown">
                <div class="dropdown-trigger">
                    <button class="button is-borderless" aria-haspopup="true" aria-controls="dropdown-menu">
                        <span class="icon">
                            <i class="fas fa-sort-amount-down"></i>
                        </span>
                        <span>SORT BY</span>
                    </button>
                </div>
                <div class="dropdown-menu" id="sort-comments-menu" role="menu">
                    <div class="dropdown-content">
                        <form name="sort-comments-form" action="{{ route('sort-comments', ['post' => $post]) }}" class="control" method="POST">
                            <a href="#" class="dropdown-item">Most Replies</a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">Newest First</a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">Oldest First</a>
                            <input name="sortBy" type="text" class="input is-hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>