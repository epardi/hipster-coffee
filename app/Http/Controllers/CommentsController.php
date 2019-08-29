<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Collection;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sort(Post $post)
    {
        $comments = $post->comments()->get();
        $commentsCount = Comment::where('post_id', $post->id)->get()->count();
        $sortMethod = request()->sortBy;
        $user = User::find(Auth::id());
        switch ($sortMethod) {
            case 'Most Replies':
                $comments = $comments->sortByDesc(function ($comment) {
                    return $comment->replies->count();
                });
                break;
            case 'Newest First':
                $comments = $comments->sortByDesc('published_at');
                break;
            case 'Oldest First':
                $comments = $comments->sortBy('published_at');
                break;
            default:
                break;
        }
        return view('posts.show', compact('user', 'post', 'comments', 'commentsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $this->authorize('create', Comment::class);
        $post = Post::find($postId);

        $comment = Comment::make($this->validateRequest());
        $comment->name = auth()->user()->name;
        $comment->slug = Str::slug($comment->name);
        $comment->published_at = now();
        $comment->post_id = $postId;
        $comment->user_id = Auth::id();

        $post->comments()->save($comment);

        $comments = $post->comments;
        $commentsCount = Comment::where('post_id', $post->id)->get()->count();
        $user = User::find(Auth::id());
        return view('posts.show', compact('post', 'comments', 'commentsCount', 'user'));
    }

    public function storeReply($postId, $commentId)
    {
        $this->authorize('create', Comment::class);
        $post = Post::find($postId);
        $comment = Comment::find($commentId);

        $reply = Comment::make($this->validateRequest());
        if (isset($errors)) {
            session()->put('commentId', $comment->id);
        }

        $reply->name = auth()->user()->name;
        $reply->slug = Str::slug($reply->name);
        $reply->published_at = now();
        $reply->post_id = $postId;
        $reply->user_id = Auth::id();
        $reply->parent_id = $comment->id;

        $comment->replies()->save($reply);

        $comments = $post->comments;
        $commentsCount = Comment::where('post_id', $post->id)->get()->count();
        $user = User::find(Auth::id());
        return view('posts.show', compact('post', 'comments', 'commentsCount', 'user'));
    }

    private function validateRequest()
    {
        return request()->validate([
            'body' => 'required|min:5|max:2000',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($postId, $commentId)
    {
        $post = Post::find($postId);
        $comment = Comment::find($commentId);
        $this->authorize('update', $comment);

        return view('comments.edit', compact('post', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update($postId, $commentId)
    {
        $post = Post::find($postId);
        $comment = Comment::find($commentId);
        $user = User::find(Auth::id());

        $comment->update($this->validateRequest());
        $comments = $post->comments;
        $commentsCount = Comment::where('post_id', $post->id)->get()->count();
        return view('posts.show', compact('user', 'post', 'comments', 'commentsCount'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $comments = new Collection();
        // Make a list of IDs for comments to delete
        $commentIds = [];
        switch (request()->comments) {
                // Get the IDs from hidden inputs
            case 'Checked Comments':
                if (isset(request()->commentIds)) {
                    $commentIds = explode(',', request()->commentIds);
                    $comments = Comment::find($commentIds);
                }
                if (isset(request()->replyIds)) {
                    $replyIds = explode(',', request()->replyIds);
                    $replies = Comment::find($replyIds);
                    foreach ($replyIds as $id) {
                        array_push($commentIds, $id);
                    }
                    if ($comments->isEmpty()) {
                        foreach ($replies as $reply) {
                            $comments->push($reply);
                        }
                    } else {
                        $comments->concat($replies);
                    }
                }
                break;
            case 'All Comments':
                global $comments, $commentIds;
                $commentIds = $post->comments->pluck('id')->all();
                $comments = Comment::find($commentIds);
                break;
            default:
                break;
        }

        $user = auth()->user();
        if (!isset($user)) {
            session()->flash('error', 'Please login or register.');
        } elseif (Gate::forUser($user)->allows('delete-comments', $comments)) {
            Comment::destroy($commentIds);
        } else {
            session()->flash('error', 'Please select only your own comments.');
        }

        return redirect('posts/' . $post->slug);
    }
}
