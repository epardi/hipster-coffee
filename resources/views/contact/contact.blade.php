@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

    <h1 class="contact-title is-size-1 has-text-weight-bold has-text-centered has-text-dark has-background-white">CONTACT US</h1>
    <section class="section is-medium has-background-white">
        <div class="columns is-centered">
            <div class="column is-three-quarters-fullhd is-10-tablet">
                <div class="columns is-variable is-flex flex-column flex-row-widescreen">
                    <div class="col-wrapper column is-flex flex-column">
                        <h3 class="is-size-3 has-text-weight-bold has-text-dark">WRITE US</h3>
                        <div class="is-divider" style="height: 3px; background-color: #c7a17a;"></div>
                        <p class="has-text-grey has-padding-bottom-50">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis,  hinc partem ei est. Eos ei nisl graecis, vix aperiri nsequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id.</p>
                        <form action="#" class="control">
                            <div class="field">
                                <input type="text" class="input is-expanded" placeholder="Your Name">
                            </div>
                            <div class="field">
                                <input type="email" class="input is-expanded" placeholder="Your Email">
                            </div>
                            <div class="field">
                                <textarea name="contact-message" id="contact-message" rows="10" class="textarea is-expanded"></textarea>
                            </div>
                            <div class="field">
                            <button class="input button is-primary is-pulled-right" onclick="event.preventDefault();">SEND</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-wrapper column is-flex flex-column">
                        <h3 class="is-size-3 has-text-weight-bold has-text-dark">LOCATIONS</h3>
                        <div class="is-divider" style="height: 3px; background-color: #c7a17a;"></div>
                        <p class="has-text-grey has-padding-bottom-50">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis,  hinc partem ei est. Eos ei nisl graecis, vix aperiri nsequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id.</p>
                        <div class="columns cols-container">
                            @include('contact.contact-col')
                            @include('contact.contact-col')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="map"></div>

    <style>
        .contact-title {
            padding-top: 2rem;
            text-decoration: underline;
            text-decoration-color: #c7a17a;
            text-underline-position: under;
        }
        input, textarea {
            font-style: italic;
            background-color: #f6f4ef !important;
            color: #c7a17a !important;
        }
        #map {
            height: 430px;
        }
        @media (max-width: 1279px) {
            .col-wrapper:nth-of-type(2) {
                margin-top: 50px;
            }
        }
        @media (min-width:769px) {
            .cols-container {
                display: flex;
                justify-content: space-around;
            }
        }
    </style>
    <script type="text/javascript" src="{{ asset('./js/map.js') }}"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5RNK2hXb7qsGMXtMIGbp5rq-eCm0nh4E&callback=initMap">
    </script>
@endsection