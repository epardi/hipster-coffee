@section('title', 'Hipster Coffee Shop')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- Styles -->

        <link rel="stylesheet" href="{{ asset('css/bulma.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bulma-helpers.min.css') }}">
    </head>
    <body>
        <div id="app">
            <nav class="navbar has-shadow has-text-centered-tablet has-text-centered-mobile has-background-dark-navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}" class="navbar-item has-text-white"><i class="fas fa-coffee has-text-tan"></i></a>
                        <div class="navbar-burger burger has-text-white" data-target="navMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <div class="navbar-menu" id="navMenu">
                        <div class="navbar-start">
                            <a href="{{ url('/') }}" class="navbar-item has-text-white has-background-dark-navbar">Home</a>
                            <a href="{{ url('/menu') }}" class="navbar-item has-text-white has-background-dark-navbar">Menu</a>
                            <a href="{{ route('posts.index') }}" class="navbar-item has-text-white has-background-dark-navbar">Blog</a>
                            <a href="{{ url('/about') }}" class="navbar-item has-text-white has-background-dark-navbar">About</a>
                            <a href="{{ url('/contact') }}" class="navbar-item has-text-white has-background-dark-navbar">Contact</a>
                        </div>

                        <div class="navbar-end">
                            @if (!auth()->user())
                                <a class="navbar-item has-text-white has-background-dark-navbar" href="{{ route('login') }}">Login</a>
                            @else
                                <form name="avatar" action="{{ route('update-avatar') }}" class="control is-flex-tablet is-flex-mobile justify-center" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')

                                    <figure class="image has-margin-20 is-64x64 is-flex-tablet tooltip is-tooltip-bottom" data-tooltip="Update Image">
                                        <input onchange="document.forms.namedItem('avatar').submit();" class="file-input has-cursor-pointer" type="file" name="image">                                    
                                            <img class="is-rounded"
                                                @if (auth()->user()->avatar) 
                                                    src="{{ asset('/storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name . ' avatar'}}"
                                                @else
                                                    src="{{ asset('/storage/uploads/user/avatar-placeholder.png') }}" alt="avatar-placeholder"
                                                @endif
                                            >                                        
                                        </figure>
                                    @csrf
                                </form>
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link has-text-white has-background-dark-navbar" href="#">
                                        {{ auth()->user()->name }}
                                    </a>
                                        <div class="navbar-dropdown is-right">
                                            <a class="navbar-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                </div>
                            @endif
                                    <div class="navbar-item">
                                    <a class="navbar-link navbar-item is-arrowless has-text-white has-background-dark-navbar" href="{{ route('registration-index') }}">Register</a>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')

                <footer class="footer has-text-white" style="padding: 3rem 0 6rem;">
                    @include('layouts.footer-columns')
                    <hr class="has-background-dark">
                    <div class="content has-text-centered has-text-white">
                    <p>
                        <strong class=" has-text-white">Hipster Coffee Shop</strong> by Eric Pardi. Copyright 2019
                    </p>
                    </div>
                </footer>

        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('./js/deleteNotification.js') }}"></script>
    </body>
</html>
