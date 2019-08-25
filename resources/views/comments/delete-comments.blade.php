<section class="accordions">
    <article class="accordion delete-comments-accordion is-mocha">
        <div class="accordion-header toggle">
            <p>Delete Comments</p>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="accordion-body">
            <div class="accordion-content">
                <form id="delete-user-comments" class="control" action="{{ route('user-comments.destroy', ['post' => $post, 'user' => auth()->user()] ) }}" method="POST">
                    @method('DELETE')
                    <div class="control is-expanded">
                        <div class="select is-fullwidth">
                            <select disabled name="users" id="users-select">
                                @if ($comments->isNotEmpty())
                                    {{-- Get list of unique users                                                                                                                          --}}
                                    @foreach (
                                        App\Comment::where('post_id', $post->id)->get()
                                            ->sortBy('name')
                                            ->pluck('user')
                                            ->unique() 
                                            as $user)
                                        <option value="{{ $user->name }} (id: {{ $user->id }})">{{ $user->name }} (id: {{ $user->id }})</option>
                                    @endforeach                                        
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="control has-margin-top-10">
                        <input id="users" name="comments" class="is-checkradio" type="radio" value="User Comments">
                        <label class="is-marginless" for="users">User Comments</label>
                    </div>
                    @csrf
                </form>
                <form name="delete-comments" class="control" action="{{ route('comments.destroy', ['post' => $post]) }}" method="POST">
                    @method('DELETE')
                    <div class="field">
                        <div class="control has-margin-top-10">
                            <input id="checked-comments" name="comments" class="is-checkradio" type="radio" value="Checked Comments">
                            <label class="is-marginless" for="checked-comments">Checked Comments</label>
                            <input class="is-hidden" name="commentIds" type="text">
                            <input class="is-hidden" name="replyIds" type="text">
                        </div>
                        <div class="control has-margin-top-10">
                            <input id="all-comments" name="comments" class="is-checkradio" type="radio" value="All Comments">
                            <label class="is-marginless" for="all-comments">All Comments</label>
                        </div>
                    </div>
                    <div class="control is-flex justify-center">
                        <button disabled id="deletePostComments" class="button is-mocha is-fullwidth">Delete Post Comments</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </article>
</section>