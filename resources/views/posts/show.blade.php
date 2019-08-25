@extends('layouts.app')

@section('title', $post->title)

@section('content')

<section class="section">
    <div class="columns is-centered">
        <div class="column is-7-desktop">

            @include('posts.post')
            <div class="field is-grouped is-grouped-right">
                @can('update', $post)
                    <div class="control">
                        <a class="button is-frappe" href="{{ route('posts.edit', ['post' => $post]) }}">
                            <span class="icon">
                                <i class="far fa-edit"></i>
                            </span>
                            <span>Edit</span>
                        </a>
                    </div>
                @endcan
                @can('delete', $post)
                    <div class="control">                   
                        <button class="button is-mocha delete-post">
                            <span class="icon">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                            <span>Delete Post</span>
                        </button>
                    </div>
                @endcan
                @include('posts.post-modal')
            </div>
                <div class="is-divider"></div>
                <div class="notification is-tan @if (!session('error')) is-hidden @endif">
                    {{ session('error') }}
                    <button class="delete"></button>
                </div>
                @if (auth()->user())
                    @include('comments.delete-comments')                
                @endif
                @include('comments.modal')               
                @include('comments.comments-heading')
                @foreach ($comments as $comment)
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
                            @include('comments.comment')
                            @include('comments.reply-form')
                            @foreach ($comment->replies as $reply)
                                @include('comments.reply')
                            @endforeach                            
                        </div>                          
                    </div>
                    <div class="is-divider"></div>
                @endforeach
                @include('comments.comment-form')                
        </div>
    </div>
</section>

<script type="text/javascript" src="{{ asset('./js/postModal.js') }}"></script>
<script type="text/javascript" src="{{ asset('./js/comments.js') }}"></script>
{{ session()->forget('commentId') }}
@endsection