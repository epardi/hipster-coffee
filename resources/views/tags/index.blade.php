@extends('layouts.app')

@section('title', 'Coffeeshop Tags')

@section('content')

<section class="section has-page-height is-flex flex-column justify-start">
    <div class="columns is-centered">
        <div class="column is-7-desktop">
            <h1 class="title is-1 has-text-centered">Tags</h1>
            <div class="content">
                @if (session('success'))
                    <div class="notification is-tan">
                        <button class="delete"></button>
                        Tags saved!
                    </div>
                @endif
                <form action="{{ route('tags.update') }}" class="control" method="POST">
                    @include('tags.form')
                    <div class="control">
                        <div class="buttons is-right">
                            <button class="button is-primary" type="submit">Save Tags</button>
                        </div>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</section>

@endsection
 
