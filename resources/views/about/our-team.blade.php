<h1 class="is-size-1 has-text-centered has-text-dark has-background-white has-text-weight-bold about-title">MEET OUR TEAM</h1>
<section class="section has-background-white">
    <div class="columns is-centered">
        <div class="column is-three-quarters-widescreen is-full-desktop">
            <div class="team-cols columns flex-column-desktop-only flex-column-tablet-only align-items-center">
                <div class="team-col column is-full-tablet is-flex justify-center">
                    <div class="team-member container has-text-centered">
                        <figure class="image">
                            <img src="{{ asset('storage/about/Team-img-1.jpg') }}" alt="Team-img-1" />
                        </figure>
                        <h4 class="is-size-4 has-text-weight-bold has-text-dark has-padding-top-20">FEDERICO HICKMAN</h4>
                        @include('about.team-member-desc')
                    </div>
                    <div class="team-member container has-text-centered">
                        <figure class="image">
                            <img src="{{ asset('storage/about/Team-img-4.jpg') }}" alt="Team-img-4" />
                        </figure>
                        <h4 class="is-size-4 has-text-weight-bold has-text-dark has-padding-top-20">FEDERICO HICKMAN</h4>
                        @include('about.team-member-desc')
                    </div>
                </div>
                <div class="team-col column is-full-tablet is-flex justify-center">
                    <div class="team-member container has-text-centered">
                        <figure class="image">
                            <img src="{{ asset('storage/about/Team-img-2.jpg') }}" alt="Team-img-2" />
                        </figure>
                        <h4 class="is-size-4 has-text-weight-bold has-text-dark has-padding-top-20">GWILYM DAVIES</h4>
                        @include('about.team-member-desc')
                    </div>
                    <div class="team-member container has-text-centered">
                        <figure class="image">
                            <img src="{{ asset('storage/about/Team-img-5.jpg') }}" alt="Team-img-5" />
                        </figure>
                        <h4 class="is-size-4 has-text-weight-bold has-text-dark has-padding-top-20">GWILYM DAVIES</h4>
                        @include('about.team-member-desc')
                    </div>
                </div>
                <div class="team-col column is-full-tablet is-flex justify-center">
                    <div class="team-member container has-text-centered">
                        <figure class="image">
                            <img src="{{ asset('storage/about/Team-img-3.jpg') }}" alt="Team-img-3" />
                        </figure>
                        <h4 class="is-size-4 has-text-weight-bold has-text-dark has-padding-top-20">ALEJANDRO MENDEZ</h4>
                        @include('about.team-member-desc')
                    </div>
                    <div class="team-member container has-text-centered">
                        <figure class="image">
                            <img src="{{ asset('storage/about/Team-img-6.jpg') }}" alt="Team-img-6" />
                        </figure>
                        <h4 class="is-size-4 has-text-weight-bold has-text-dark has-padding-top-20">ALEJANDRO MENDEZ</h4>
                        @include('about.team-member-desc')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .team-col {
        flex-direction: column;
    }
    .team-member {
        margin-bottom: 50px;
    }
    @media (min-width: 1024px) {
        .team-member:nth-of-type(odd) {
            margin-bottom: 50px;
        }
    }
    @media (min-width: 1024px) and (max-width: 1279px) {
        .team-col {
            flex-direction: row;
        }
        .team-member {
            padding: 1rem;
        }
    }
    @media (min-width: 1279px) {
        .team-col {
            width: 33.3333% !important;
            margin-bottom: 50px;
        }
    }
   
</style>