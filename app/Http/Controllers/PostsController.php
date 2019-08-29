<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Arr;
use Session;
use Storage;
use Str;
use Auth;
use App\Like;
use App\Dislike;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag = null)
    {
        // If there's a filter tag parameter, get all the posts with that tag
        // and paginate. Otherwise, just fetch all the posts and paginate them.
        $posts = isset($tag) ? $tag->posts()->paginate(5) : Post::paginate(5);
        $posts->each(function ($post) {
            $post->body = Str::limit($post->body, 300, '...');
        });

        $tags = Tag::all();
        $user = User::find(Auth::id());
        return view('posts.index', compact('posts', 'tags', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        $post = new Post();
        $tags = Tag::all();

        return view('posts.create', compact('post', 'tags'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::make($this->validateRequest());

        $post->author = auth()->user()->name;
        $post->published_at = now();
        $post->slug = Str::slug($post->title);
        $post->save();
        $this->storeImage($post);

        $posts = Post::paginate(5);
        $posts->each(function ($post) {
            $post->body = Str::limit($post->body, 300, '...');
        });
        $tags = array_filter(Tag::all()->all(), function ($tag) {
            // Get the tag names from the hidden input
            $strTags = request()->tagList;
            $tagNames = explode(',', $strTags);
            return in_array($tag->name, $tagNames);
        });
        $tagIds = Arr::pluck($tags, 'id');

        $post->tags()->sync($tagIds, false);
        $tags = Tag::all();
        return view('posts.index', compact('posts', 'tags'));
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);
    }

    private function storeImage($post)
    {
        if (request()->has('image')) {
            $post->update([
                'image' => request()->image->store('uploads/post', 'public'),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->update(['views' => $post->views + 1]);
        $comments = $post->comments;
        $commentsCount = Comment::where('post_id', $post->id)->get()->count();
        $user = User::find(Auth::id());

        return view('posts.show', compact('post', 'comments', 'commentsCount', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $tags = Tag::all();
        $tagInput = implode(',', Arr::pluck($post->tags, 'name'));

        return view('posts.edit', compact('post', 'tags', 'tagInput'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request)
    {
        $post->update($this->validateRequest());
        $post->update(['slug' => Str::slug($post->title),]);
        $this->storeImage($post);
        // Get the tag names from the hidden input.
        $tags = array_filter(Tag::all()->all(), function ($tag) {
            $strTags = request()->tagList;
            $tagNames = explode(',', $strTags);
            return in_array($tag->name, $tagNames);
        });
        $tagIds = Arr::pluck($tags, 'id');

        if (isset(request()->tagList)) {
            $post->tags()->sync($tagIds);
        } else {
            $post->tags()->sync([]);
        }

        return redirect('posts/' . $post->slug);
    }

    public function updateLikes(Post $post, Request $request)
    {
        $user = User::find(Auth::id());
        if (isset($user)) {
            // Check if the hidden like/dislike checkboxes are checked, or "on," and
            // update likes/dislikes accordingly.
            if ($request->like == 'on') {
                $post->likes()->save(new Like(['post_id' => $post->id, 'user_id' => $user->id]));
            }
            if ($request->dislike == 'on') {
                $post->dislikes()->save(new Dislike(['post_id' => $post->id, 'user_id' => $user->id]));
            }
        }

        return redirect('posts/' . $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
        $this->authorize('delete', $post);

        $request->session()->put('postName', $post->title);
        Session::flash('success');

        if (isset($post->image)) {
            Storage::delete('public/' . $post->image);
        }

        $post->tags()->detach();
        $post->delete();

        return redirect('posts');
    }
}
