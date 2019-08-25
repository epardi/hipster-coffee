<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Arr;
use App\Post;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{
    public function __construct()
    { }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Tag::class);
        $tags = Tag::all();
        $tag = Tag::first();

        $tagNames = implode(',', Tag::all()->pluck('name')->sortBy('name')->all());

        return view('tags.index', compact('tag', 'tagNames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag();

        return view('tags.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newTagNames = explode(',', $request->name);
        $this->validateRequest();
        if (!isset($errors)) {
            foreach ($newTagNames as $newTagName) {
                Tag::create(['name' => $newTagName]);
            }
        }

        // $newTagName = Tag::create($this->validateRequest());
        // $tag = Tag::create($this->validateRequest());

        return redirect('/tags');
    }

    private function validateRequest()
    {
        $validator = Validator::make(request()->all(), [
            'name' => [
                'required',
                function ($name, $value, $uniqueFail) {
                    $newTagNames = explode(',', request()->name);
                    $tagNames = Tag::all()->pluck('name')->all();
                    if ($newTagNames !== array_unique($newTagNames)) {
                        $uniqueFail('The new tags must be unique.');
                    }
                },
            ],
        ]);
        return $validator->validate();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $tags = Tag::all();

        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tag $tag, Request $request)
    {
        $this->authorize('update', $tag);
        $tags = Tag::all();
        $oldNames = $tags->pluck('name')->all();
        // Get the tag names from the hidden input.
        $tagNames = explode(',', $request->name);
        $this->validateRequest();
        if (!isset($errors)) {
            $tagsToDelete = $tags->whereNotIn('name', $tagNames);
            foreach ($tagsToDelete as $tag) {
                $this->destroy($tag);
            }
            foreach ($tagNames as $name) {
                if (!in_array($name, $oldNames)) {
                    Tag::create(['name' => $name]);
                }
            }
        }
        session()->flash('success');
        return redirect('/tags')->with($tagNames);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->posts()->detach();
        $tag->delete();
    }
}
