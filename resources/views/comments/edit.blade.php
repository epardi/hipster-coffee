@extends('layouts.app')

@section('title', 'Edit ' . $comment->name . "'s Comment")

@section('content')

<section class="section">
    <div class="columns is-centered">
        <div class="column is-7-desktop">
            <div class="box">
            <h1 class="title is-1 has-text-grey-darker">Edit {{ isset($comment->parent_id) ? 'Reply' : 'Comment' }}</h1>
                <div class="media has-margin-top-50">
                    <div class="media-left">
                        @if ($comment->user->avatar)
                            <figure class="image">
                                <img class="is-rounded" src="{{ asset('/storage/' . $comment->user->avatar) }}" alt="">
                            </figure>
                        @else
                        <figure class="image is-48x48">
                            <img class="is-rounded" src="{{ asset('/storage/uploads/user/avatar-placeholder.png') }}" alt="avatar-placeholder">
                        </figure>
                        @endif
                </div>
                <div class="media-content">
                    <div class="content comment-content">
                        <p>{{ $comment->name }}</p>
                        <span>{{ date('F j, Y', strtotime($comment->published_at)) }}</span>

                            <form action="{{ route('comments.update', ['postId' => $post->id, 'commentId' => $comment->id]) }}" class="control" method="POST" enctype="multipart/form-data">

                            @method('PATCH')

                            <div class="control">
                                <textarea rows="8" name="body" class="textarea" value="{{ old('body') }}">{{ $comment->body }}</textarea>
                                <p class="help is-danger">{{ $errors->first('body') }}</p>
                            <div class="control">
                                <button class="button is-primary" type="submit">Save</button>
                            </div>
                            @csrf
                        </form>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</section>

@endsection