@extends('frontend.layouts.app')

@section('content')
<section class="breadcumb-wrapper" data-bg-src="{{ asset('frontend/assets/img/hero/hero_bg_5_3.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Crestwell Facilities</h1>
            <ul class="breadcumb-menu"><li><a href="{{ route('frontend.home') }}">Home</a></li><li>Contact</li></ul>
        </div>
    </div>
</section>

<section class="space cw-contact-section">
    <div class="container">
        <div class="row gy-5 gx-xl-5 align-items-center">
            <div class="col-lg-5">
                <div class="cw-contact-copy">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Get in Touch</span>
                    <h2 class="sec-title">Request a Quote or Speak to the Team</h2>
                    <p class="cw-contact-lead">For commercial cleaning, office cleaning, property cleaning or facilities support, send your details and Crestwell will respond with clear next steps.</p>
                    <div class="cw-contact-methods">
                        <a class="cw-contact-method" href="tel:{{ config('site.phone_link') }}">
                            <span class="cw-contact-method-icon"><i class="fas fa-phone"></i></span>
                            <span><strong>Phone</strong>{{ config('site.phone') }}</span>
                        </a>
                        <a class="cw-contact-method" href="https://wa.me/{{ preg_replace('/\D+/', '', config('site.whatsapp')) }}">
                            <span class="cw-contact-method-icon"><i class="fab fa-whatsapp"></i></span>
                            <span><strong>WhatsApp</strong>{{ config('site.whatsapp') }}</span>
                        </a>
                        <a class="cw-contact-method" href="mailto:{{ config('site.email') }}">
                            <span class="cw-contact-method-icon"><i class="fas fa-envelope"></i></span>
                            <span><strong>Email</strong>{{ config('site.email') }}</span>
                        </a>
                    </div>
                    <div class="cw-contact-promise">
                        <span><i class="fas fa-shield-check"></i> Commercial sites</span>
                        <span><i class="fas fa-clock"></i> Fast response</span>
                        <span><i class="fas fa-broom"></i> Tailored scope</span>
                    </div>
                    @include('frontend.partials.contact-action-buttons')
                </div>
            </div>
            <div class="col-lg-7">
                <div class="cw-quote-panel cw-contact-form-panel">
                    <div class="cw-form-heading">
                        <span>Quote request</span>
                        <h3>Tell us what needs cleaning</h3>
                    </div>
                    @include('frontend.partials.quote-form')
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.partials.google-review')

<section class="space bg-smoke">
    <div class="container">
        <div class="row gy-4 align-items-stretch">
            <div class="col-lg-7">
                <div class="cw-map-panel h-100">
                    <iframe class="cw-map" src="{{ config('site.google_maps_embed') }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="cw-contact-coverage h-100">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Coverage</span>
                    <h2>Service Coverage Areas</h2>
                    <div class="cw-location-list">
                        @foreach($locations as $location)
                            <div>
                                <h3>{{ $location->name }}</h3>
                                <p>{{ $location->description }}</p>
                                @if($location->postcodeArea)
                                    <small>{{ $location->postcodeArea }}</small>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
