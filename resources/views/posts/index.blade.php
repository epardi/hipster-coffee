@extends('layouts.app')

@section('title', 'Our Blog')
@section('content')
    <section class="section">
    <div id="blog-container" class="columns is-centered">
        <div class="column is-7-desktop">
            <h1 class="blog-title title is-1 has-text-centered">BLOG</h1>

            @if (session('success'))
                <div class="notification is-tan">
                    <button class="delete"></button>
                    {{ 'The post "' . strtoupper(session()->pull('postName')) . '" was successfully deleted.' }}
                </div>
            @endif

            @can('create', App\Post::class)
            <div class="buttons is-centered">
                <a class="button is-link is-large has-background-tan" href="{{ route('posts.create') }}">Add New Post</a>
            </div>
            @endcan
            @can('viewAny', App\Tag::class)
                <h3 class="title is-3 has-text-centered">
                    <span class="icon has-text-tan"><i class="fas fa-tag"></i></span>
                    <a href="{{ route('tags.index') }}">Tags</a>
                </h3>
            @endcan
                <section class="accordions has-margin-bottom-30">
                    <article class="accordion is-active">
                        <div class="accordion-header toggle has-background-tan">
                        <p>Filter By Tag</p>
                        </div>
                        <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="buttons is-centered">
                                @foreach($tags as $tag)
                                    <a href="{{ route('posts.tag', ['tag' => $tag]) }}" class="button has-background-tan has-text-white" name="tag">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        </div>
                    </article>
                </section>
            @foreach($posts as $post)
                @include('posts.post')
                <div class="is-divider"></div>
            @endforeach
                {{ $posts->links() }}
        </div>
    </div>
</section>

<style>
    .blog-title {
        padding-bottom: 2rem;
        text-decoration: underline;
        text-decoration-color: #c7a17a;
        text-underline-position: under;
    }
</style>
@endsection

