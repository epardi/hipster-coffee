@if($post->image)
 <img class="image" src="{{ asset('/storage/' . $post->image) }}" alt="">
@endif
<p class="title is-4 has-padding-top-30">
    @if(Str::contains(request()->path(), 'posts/') && !Str::contains(request()->path(), '/tags/'))
        <span class="title is-uppercase">
            {{ $post->title }}
        </span>
    @else
        <a class="title is-uppercase" href="{{ route('posts.show', ['post' => $post]) }}">
            {{ $post->title }}
        </a>
    @endif   
</p>
<div class="level is-mobile has-margin-bottom-10">
    <div class="level-left">
        <p class="level-item">{{ $post->views }} {{ $post->views == 1 ? 'View' : 'Views' }}</p>
    </div>
    <div class="level-right">
        @if(Str::contains(request()->path(), 'posts/') && !Str::contains(request()->path(), '/tags/'))
            <form name="likes-form" action="{{ route('update-likes', ['post' => $post]) }}" class="level-item control" method="POST">
                @method('PATCH')
                <fieldset 
                    @if ((!$user) || ($user->likes->where('post_id', $post->id)->isNotEmpty()
                        || $user->dislikes->where('post_id', $post->id)->isNotEmpty())) 
                        disabled
                    @endif                   
                >
                    <div class="field is-grouped is-grouped-right">
                        <div class="control">
                            <span id="like-btn" 
                                class="icon is-borderless
                                    @unless($user && $user->dislikes->where('post_id', $post->id)->isNotEmpty()) tooltip @endunless
                                    @if ($user && $user->likes->where('post_id', $post->id)->isNotEmpty()) has-text-tan @endif"
                                    @if (!$user)
                                        data-tooltip="Login to like post"
                                    @elseif ($user->likes->where('post_id', $post->id)->isEmpty())                      
                                        data-tooltip="Like this post"
                                    @else
                                        data-tooltip="You liked this post"
                                    @endif
                            >
                                <i class="fas fa-thumbs-up"></i>
                            </span>
                            <span id="likes">{{ $post->likes->count() }}</span>
                            <input name="like" type="checkbox" class="is-hidden">
                        </div>
                        <div class="control">
                            <span id="dislike-btn" 
                                class="icon is-borderless
                                    @unless($user && $user->likes->where('post_id', $post->id)->isNotEmpty()) tooltip @endunless
                                    @if ($user && $user->dislikes->where('post_id', $post->id)->isNotEmpty()) has-text-tan @endif"
                                    @if (!$user)
                                        data-tooltip="Login to dislike post"
                                    @elseif ($user->dislikes->where('post_id', $post->id)->isEmpty())
                                        data-tooltip="Dislike this post"
                                    @else
                                        data-tooltip="You disliked this post"
                                    @endif
                            >
                                <i class="fas fa-thumbs-down"></i>
                            </span>
                            <span id="dislikes">{{ $post->dislikes->count() }}</span>
                            <input name="dislike" type="checkbox" class="is-hidden">
                        </div>
                    </div>
                </fieldset>
                @csrf
            </form>
        @else
            <div class="level-item">
                @include('posts.social-media-icons')
            </div>
        @endif
    </div>        
</div>
@if(Str::contains(request()->path(), 'posts/') && !Str::contains(request()->path(), '/tags/'))
    <progress class="progress is-small is-tan has-width-200 is-pulled-right" value="{{ $post->likes->count() }}" max="{{ $post->likes->count() + $post->dislikes->count() }}">{{ $post->likes->count() }}</progress><br />
@endif
    <div class="level has-padding-top-15">
        <div class="level-left">
            <span class="level-item">by {{ $post->author }}</span>
            <div class="level-item is-divider-vertical"></div>
            <span class="level-item">{{ date('F j, Y', strtotime($post->published_at)) }}</span>
        </div>
    </div>
<div class="level">
    <div class="level-left">
        <div class="tags level-item">
        <span class="icon has-padding-right-20"><i class="fas fa-tag"></i></span>
            @foreach($post->tags->sortBy('name') as $tag)
                <span class="tag is-primary is-medium">{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>
</div>
<div class="content">
    <p>{!! str_replace(array("\r", "\n", "\r\n"), "<br />", $post->body) !!}</p>
</div>
@if(request()->is('posts/' . $post->slug) && !Str::contains(request()->path(), '/tags/'))
    @include('posts.social-media-icons')
@endif
