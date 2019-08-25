@extends('layouts.app')

@section('title', 'Create New Post')

@section('scripts')
<script type="text/javascript" src="{{ asset('js/postsubmit.js') }}"></script>
@endsection

@section('content')
<section class="section">
    <div class="columns is-centered">
        <div class="column is-5-desktop">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        New Post
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <form name="post" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @include('posts.form')
                            <div class="control">
                                <div class="buttons is-right">
                                    <button class="button is-primary" type="submit">Add New Post</button>
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