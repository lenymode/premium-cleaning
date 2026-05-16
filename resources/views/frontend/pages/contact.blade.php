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

<section class="space">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5">
                <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Get in Touch</span>
                <h2 class="sec-title">Request a Quote or Speak to the Team</h2>
                <p>For commercial cleaning, office cleaning, property cleaning or facilities support, send your details and Crestwell will respond with next steps.</p>
                <p><strong>Phone:</strong> <a href="tel:{{ config('site.phone_link') }}">{{ config('site.phone') }}</a></p>
                <p><strong>WhatsApp:</strong> <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('site.whatsapp')) }}">{{ config('site.whatsapp') }}</a></p>
                <p><strong>Email:</strong> <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></p>
                @include('frontend.partials.contact-action-buttons')
            </div>
            <div class="col-lg-7">
                <div class="cw-quote-panel">@include('frontend.partials.quote-form')</div>
            </div>
        </div>
    </div>
</section>

<section class="space bg-smoke">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-7"><iframe class="cw-map" src="{{ config('site.google_maps_embed') }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            <div class="col-lg-5">
                <h2>Service Coverage Areas</h2>
                @foreach($locations as $location)
                    <p><strong>{{ $location->name }}</strong><br>{{ $location->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
