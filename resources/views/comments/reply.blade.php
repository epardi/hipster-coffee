<div class="media has-padding-top-50">
    <div class="media-left">
        @if ($reply->user->avatar)
            <figure class="image">
                <img class="is-rounded" src="{{ asset('/storage/' . $reply->user->avatar) }}" alt="">
            </figure>
        @else
        <figure class="image is-24x24">
            <img class="is-rounded" src="{{ asset('/storage/uploads/user/avatar-placeholder.png') }}" alt="avatar-placeholder">
        </figure>
        @endif
    </div>
    <div class="media-content">
        <div class="content">
            <div class="level is-mobile">
                <div class="level-left">
                    <p class="level-item">{{ $reply->name }}</p>
                </div>
                <div class="level-right">
                    <div class="level-item control">
                        @can ('update', $reply)
                            <a class="button is-frappe" href="{{ route('comments.edit', ['postId' => $post->id, 'commentId' => $reply->id]) }}">
                                <span class="icon">
                                    <i class="far fa-edit"></i>
                                </span>
                                <span>Edit</span>
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="control is-flex justify-flex-end">
                @can ('delete', $reply)
                    <input id="delete-reply-checkbox-{{ $reply->id }}" name="delete-reply-checkbox" class="is-checkradio is-danger" type="checkbox">
                    <label for="delete-reply-checkbox-{{ $reply->id }}">
                        Mark for deletion
                    </label>
                @endcan
            </div>
            <div class="level is-mobile">
                <div class="level-left">
                    <span class="levl-item is-italic">{{ date('F j, Y', strtotime($reply->published_at)) }}</span>
                </div>                                           
            </div>
            <p>{{ $reply->body }}</p>
        </div>
    </div>
</div>