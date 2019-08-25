@extends('layouts.app')

@section('title', 'About Us')

@section('content')

@include('about.about-me')
<h1 class="is-size-1 has-text-weight-bold has-text-centered has-text-dark has-background-white about-title">WHAT WE OFFER</h1>
    <section class="section is-medium has-background-white">
        <div class="columns is-centered">
            <div class="column is-three-quarters-widescreen is-full-desktop">
                <div class="columns is-variable is-8 is-flex-tablet-only flex-column-tablet-only">
                    <div class="column is-flex flex-column offers-column">
                        <div class="container is-flex justify-space-between justify-center-tablet-only">
                            <span class="icon has-text-tan">
                                <i class="fas fa-wifi fa-3x"></i>
                            </span>
                            <div class="content has-padding-left-60">
                                <h4 class="title is-5">FREE WIFI</h4>
                                <p class="has-text-grey">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc</p>
                            </div>
                        </div>
                        <div class="container is-flex justify-space-between justify-center-tablet-only has-padding-top-70">
                            <span class="icon has-text-tan">
                                <i class="fas fa-book-open fa-3x"></i>
                            </span>
                            <div class="content has-padding-left-60">
                                <h4 class="title is-5">BOOKS AND NEWSPAPERS</h4>
                                <p class="has-text-grey">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc</p>
                            </div>
                        </div>
                        <div class="container is-flex justify-space-between justify-center-tablet-only has-padding-top-70">
                            <span class="icon has-text-tan">
                                <i class="fas fa-sun fa-3x"></i>
                            </span>
                            <div class="content has-padding-left-60">
                                <h4 class="title is-5">BOOKS AND NEWSPAPERS</h4>
                                <p class="has-text-grey">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc</p>
                            </div>
                        </div>
                    </div>
                    <div class="column is-flex flex-column offers-column">
                        <div class="container is-flex justify-space-between justify-center-tablet-only">
                            <span class="icon has-text-tan">
                                <i class="fas fa-gift fa-3x"></i>
                            </span>
                            <div class="content has-padding-left-60">
                                <h4 class="title is-5">SPECIAL OFFER</h4>
                                <p class="has-text-grey">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc</p>
                            </div>
                        </div>
                        <div class="container is-flex justify-space-between justify-center-tablet-only has-padding-top-70">
                            <span class="icon has-text-tan">
                                <i class="fas fa-star fa-3x"></i>
                            </span>
                            <div class="content has-padding-left-60">
                                <h4 class="title is-5">NEW FLAVORS</h4>
                                <p class="has-text-grey">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc</p>
                            </div>
                        </div>
                        <div class="container is-flex justify-space-between justify-center-tablet-only has-padding-top-70">
                            <span class="icon has-text-tan">
                                <i class="fas fa-map-marker-alt fa-3x"></i>
                            </span>
                            <div class="content has-padding-left-60">
                                <h4 class="title is-5">NEW LOCATIONS</h4>
                                <p class="has-text-grey">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc</p>
                            </div>
                        </div>
                    </div>
                    <div class="column is-flex flex-column offers-column">
                        <div class="container is-flex justify-space-between justify-center-tablet-only">
                            <span class="icon has-text-tan">
                                <i class="fas fa-microphone fa-3x"></i>
                            </span>
                            <div class="content has-padding-left-60">
                                <h4 class="title is-5">EVENTS</h4>
                                <p class="has-text-grey">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc</p>
                            </div>
                        </div>
                        <div class="container is-flex justify-space-between justify-center-tablet-only has-padding-top-70">
                            <span class="icon has-text-tan">
                                <i class="fas fa-shopping-bag fa-3x"></i>
                            </span>
                            <div class="content has-padding-left-60">
                                <h4 class="title is-5">COFFEESHOP</h4>
                                <p class="has-text-grey">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc</p>
                            </div>
                        </div>
                        <div class="container is-flex justify-space-between justify-center-tablet-only has-padding-top-70">
                            <span class="icon has-text-tan">
                                <i class="fas fa-music fa-3x"></i>
                            </span>
                            <div class="content has-padding-left-60">
                                <h4 class="title is-5">BEST MUSIC</h4>
                                <p class="has-text-grey">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('about.our-team')

    <style>
        .about-title {
            margin: 0;
            padding: 2rem 0;
            text-decoration: underline;
            text-decoration-color: #c7a17a;
            text-underline-position: under;
        }
        @media (max-width: 1215px) {
            .offers-column {
                padding-top: 70px;
                padding-bottom: 0;
            }
        }
    </style>
@endsection