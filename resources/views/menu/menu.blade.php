@extends('layouts.app')

@section('title', 'Our Menu')

@section('content')

@php
use Illuminate\Support\Facades\DB;

$menu = DB::table('menu');
// First half of drinks from menu table
$col_1_drinks = 
    $menu->get()
    ->slice(0, ceil($menu->count() / 2))
    ->all();
// Second half of drinks from menu table
$col_2_drinks = 
    $menu->get()
    ->slice(ceil($menu->count() / 2))
    ->all();
@endphp

<h1 class="menu-title is-size-1 has-text-weight-bold has-text-centered has-text-dark">OUR MENU</h1>
<section class="section is-medium" style="background-color: #f2f0ea;">
    <div class="columns is-centered has-text-dark">
        <div class="column is-three-quarters-widescreen is-full-desktop">
            <div class="columns is-variable is-4 is-flex-tablet-only flex-column-tablet-only">
                <div class="column is-half-widescreen">
                    @foreach($col_1_drinks as $drink)
                    <div class="columns">
                        <div class="column is-narrow">
                            <image class="image is-hidden-mobile" width="83" height="83" src="{{ asset('storage/menu/' . $drink->name . '.jpg') }}" alt="{{ $drink->name }}" />
                        </div>
                        <div class="column">
                            <div class="container is-flex align-items-center justify-space-between">
                                <span class="is-size-5 has-text-weight-medium">{{ strtoupper($drink->name) }}</span>
                                <span class="has-text-weight-medium" style="margin-left: 2em;">{{ number_format($drink->price, 2) }}</span>
                            </div>
                            <hr class="has-background-grey-lighter">
                            <div class="container is-flex align-items-center justify-space-between">
                                <span class="has-text-tan">{{ $drink->description }}</span>
                                @if ($drink->is_new)
                                    <span class="has-background-tan" style="padding: 0 .75em; margin-left: 2em;">New</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="column is-half-widescreen">
                    @foreach($col_2_drinks as $drink)
                        <div class="columns">
                            <div class="column is-narrow">
                                <image class="image is-hidden-mobile" width="83" height="83" src="{{ asset('storage/menu/' . $drink->name . '.jpg') }}" alt="{{ $drink->name }}" />
                            </div>
                            <div class="column">
                                <div class="container is-flex align-items-center justify-space-between">
                                    <span class="is-size-5 has-text-weight-medium">{{ strtoupper($drink->name) }}</span>
                                    <span class="has-text-weight-medium" style="margin-left: 2em;">{{ number_format($drink->price, 2) }}</span>
                                </div>
                                <hr class="has-background-grey-lighter">
                                <div class="container is-flex align-items-center justify-space-between">
                                    <span class="has-text-tan">{{ $drink->description }}</span>
                                    @if ($drink->is_new)
                                        <span class="has-background-tan" style="padding: 0 .75em; margin-left: 2em;">New</span>
                                    @endif
                                </div>
                            </div>
                        </div>   
                    @endforeach
                    </div>
            </div>
        </div>
    </div>
</section>

<style>
    hr {
        margin: 0 0 .5rem 0;
        height: 1px;
    }
    .menu-title {
        background-color: #f2f0ea;
        margin: 0;
        padding: 2rem 0;
        text-decoration: underline;
        text-decoration-color: #c7a17a;
        text-underline-position: under;
    }
</style>
@endsection