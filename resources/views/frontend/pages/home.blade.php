@extends('frontend.layouts.app')

@section('content')
<section class="th-hero-wrapper hero-5" id="hero">
    <div class="shape-mockup starani" data-top="9%" data-left="9%"><img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape"></div>
    <div class="swiper th-slider" id="heroSlide5" data-slider-options='{"effect":"fade","autoHeight":true}'>
        <div class="swiper-wrapper">
            @foreach([
                ['image' => 'hero/hero_bg_5_1.jpg', 'title' => 'Commercial Cleaning Built for Strong Impressions', 'text' => 'Premium cleaning and facilities support for offices, commercial spaces, managed properties and high-standard residential environments.'],
                ['image' => 'hero/hero_bg_5_1.jpg', 'title' => 'Clean Spaces. Strong Impressions.', 'text' => 'A scalable service partner for businesses, landlords, agents and property operators who need reliable cleaning delivery.'],
            ] as $slide)
                <div class="swiper-slide">
                    <div class="hero-inner" data-bg-src="{{ asset('frontend/assets/img/'.$slide['image']) }}">
                        <div class="hero-overlay"><img src="{{ asset('frontend/assets/img/hero/hero_overlay_1.png') }}" alt="overlay"></div>
                        <div class="container">
                            <div class="hero-style5 cw-hero-copy">
                                {{-- <span class="cw-kicker" data-ani="slideinup" data-ani-delay="0.1s"><img class="cw-mini-logo" src="{{ asset('frontend/logo.png') }}" alt="{{ config('site.name') }}"> {{ config('site.tagline') }}</span> --}}
                                <h1 class="hero-title"><span class="title1" data-ani="slideinup" data-ani-delay="0.3s">{{ $slide['title'] }}</span></h1>
                                <p class="hero-text" data-ani="slideinup" data-ani-delay="0.5s">{{ $slide['text'] }}</p>
                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s">
                                    <a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Get Free Quote<i class="fas fa-arrow-up-right ms-2"></i></a>
                                    <a href="tel:{{ config('site.phone_link') }}" class="th-btn style6">Click to Call<i class="fas fa-phone ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="space cw-service-grid">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Commercial Cleaning & Facilities Support</span>
            <h2 class="sec-title">Services Built Around Property Standards</h2>
        </div>
        <div class="row gy-4">
            @foreach($services as $service)
                <div class="col-md-6 col-xl-4">
                    <div class="service-card">
                        <div class="box-img"><img src="{{ asset('frontend/assets/img/'.$service->image) }}" alt="{{ $service->title }}"></div>
                        <div class="box-content">
                            <h3 class="box-title"><a href="{{ route('frontend.services.show', $service->slug) }}">{{ $service->title }}</a></h3>
                            <p class="box-text">{{ $service->excerpt }}</p>
                            <a href="{{ route('frontend.services.show', $service->slug) }}" class="link-btn">View Service<i class="fas fa-arrow-up-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="space cw-trust-band">
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-lg-5">
                <span class="sub-title2 text-white"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Why Crestwell</span>
                <h2 class="sec-title text-white">Trust, Consistency and Scalable Service Delivery</h2>
            </div>
            <div class="col-lg-7">
                <div class="row gy-3">
                    @foreach($trustPoints as $point)
                        <div class="col-sm-6"><div class="cw-trust-item"><i class="fas fa-shield-check me-2"></i>{{ $point }}</div></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">How It Works</span>
            <h2 class="sec-title">A Clear Process From Quote to Delivery</h2>
        </div>
        <div class="row gy-4">
            @foreach($processSteps as $index => $step)
                <div class="col-md-6 col-xl-3">
                    <div class="feature-card">
                        <div class="box-icon"><span>{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span></div>
                        <h3 class="box-title">{{ $step['title'] }}</h3>
                        <p class="box-text">{{ $step['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="space bg-smoke">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6">
                <div class="title-area mb-3">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Lead Capture</span>
                    <h2 class="sec-title">Request a Commercial Cleaning Quote</h2>
                    <p>Send your service requirement and Crestwell will respond with the next step. Forms are CRM-ready and database-ready once you run the provided SQL.</p>
                </div>
                <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('site.whatsapp')) }}" class="th-btn style6">WhatsApp Enquiry<i class="fab fa-whatsapp ms-2"></i></a>
            </div>
            <div class="col-lg-6"><div class="cw-quote-panel">@include('frontend.partials.quote-form')</div></div>
        </div>
    </div>
</section>

<section class="testi-area2 space" id="testi-sec">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Testimonials</span>
            <h2 class="sec-title">Trusted by Property and Operations Teams</h2>
        </div>
        <div class="swiper th-slider" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"992":{"slidesPerView":2}}}'>
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testi-grid2">
                            <div class="box-review">@for($i = 0; $i < $testimonial->rating; $i++)<i class="fa-sharp fa-solid fa-star"></i>@endfor</div>
                            <p class="box-text">{{ $testimonial->quote }}</p>
                            <h3 class="box-title">{{ $testimonial->name }}</h3>
                            <span class="box-desig">{{ $testimonial->role }}{{ $testimonial->company ? ', '.$testimonial->company : '' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="space bg-smoke">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-7">
                <iframe class="cw-map" src="{{ config('site.google_maps_embed') }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-5">
                <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Service Areas</span>
                <h2 class="sec-title">Coverage for Commercial and Managed Properties</h2>
                @foreach($locations as $location)
                    <p><strong>{{ $location->name }}:</strong> {{ $location->description }}</p>
                @endforeach
                <a href="{{ config('site.google_review_url') }}" class="th-btn star-btn">Google Reviews / QR Link<i class="fas fa-arrow-up-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
