@extends('layouts.app')

@section('title', 'Edit ' . $post->title)

@section('content')

<section class="section">
    <div class="columns is-centered">
        <div class="column is-7-desktop">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Edit {{ $post->title }}
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <form class="control" action="{{ route('posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @include('posts.form')
                            <div class="control">
                                <div class="buttons is-right">
                                    <button class="button is-primary" type="submit">Save Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ asset('./js/inputTags.js') }}"></script>
@endsection