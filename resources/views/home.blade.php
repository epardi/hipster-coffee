@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="container">
            <div class="columns is-marginless is-centered">
                <div class="column is-7">
                    <div class="notification is-mocha">
                        <button class="delete"></button>
                        {{ session()->pull('error') }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section class="hero is-large">
        <div class="hero-body has-page-height-desktop is-half-height-tablet is-half-height-mobile is-paddingless flex-column justify-center">
            <div class="columns">
                <div class="column is-4 is-5-mobile is-offset-2 is-offset-1-mobile">
                    <h1 class="title hero-title has-text-white">COFFEE IS OUR LANGUAGE</h1>
                    <div class="content">
                        <p class="is-italic is-size-4-desktop is-size-5-tablet is-size-6-mobile has-text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <button class="button is-large is-primary has-margin-bottom-10">READ MORE</button>
                </div>
            </div>
        </div>
    </section>
    @include('home.what-happens-here')
    <section class="section is-medium has-background-dark-background" style="
        background: url('../../storage/home/quote-img.jpg') center center no-repeat;
        background-size: cover;
    ">
        @include('home.quote')
    </section>
    <section class="section has-background-dark-background">
        @include('home.home-flavors')
    </section>
    
    <style>
        .hero {
            background: url('../../storage/home/home-hero.jpg') center center no-repeat;
            background-size: cover;
        }
        .hero-title {
            font-size: 4em;
            font-weight: 900;
            line-height: 75px;
            word-break: keep-all;
            letter-spacing: 5px;
        }
        @media (min-width: 769px) and (max-width: 1023px) {
            .hero-title {
                font-size: 3em;
                line-height: 50px;
                letter-spacing: initial;
            }
        }
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2em;
                line-height: 50px;
                letter-spacing: initial;
            }
        }
        .hours {
            background: url('storage/home/home-img-3.jpg') center center no-repeat;
            background-size: cover;
            padding: 1rem;
        }
        .padding-top-0 {
            padding-top: 0;
        }
        .margin-top-0 {
            margin-top: 0;
        }
        hr {
            margin: 0 0 1.5rem 0;
            height: 1px;
            background-color: #acacac;
        }
    </style>
@endsection
