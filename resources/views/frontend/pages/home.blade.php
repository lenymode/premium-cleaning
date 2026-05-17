@extends('frontend.layouts.app')

@section('content')
<section class="th-hero-wrapper hero-5" id="hero">
    <div class="swiper th-slider" id="heroSlide5" data-slider-options='{"effect":"fade"}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="hero-inner" data-bg-src="{{ asset('frontend/assets/img/hero/hero_bg_5_1.jpg') }}">
                    <div class="hero-overlay"><img src="{{ asset('frontend/assets/img/hero/hero_overlay_1.png') }}" alt="overlay"></div>
                    <div class="container">
                        <div class="hero-style5 cw-hero-copy">
                            <span class="cw-kicker" data-ani="slideinup" data-ani-delay="0.1s">{{ config('site.tagline') }}</span>
                            <h1 class="hero-title"><span class="title1" data-ani="slideinup" data-ani-delay="0.3s">Commercial Cleaning & Facilities Support</span></h1>
                            <p class="hero-text" data-ani="slideinup" data-ani-delay="0.5s">Built for strong impressions across offices, commercial spaces, managed properties, serviced accommodation and high-standard residential environments.</p>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s">
                                <a href="#quote-sec" class="th-btn star-btn">Get Free Quote<i class="fas fa-arrow-up-right ms-2"></i></a>
                                <a href="tel:{{ config('site.phone_link') }}" class="th-btn style6 cw-hero-call-btn">Call Now<i class="fas fa-phone ms-2"></i></a>
                            </div>
                            <div class="cw-hero-proof" data-ani="slideinup" data-ani-delay="0.7s">
                                <span><i class="fas fa-shield-check"></i> Insured service delivery</span>
                                <span><i class="fas fa-user-check"></i> Vetted cleaners</span>
                                <span><i class="fas fa-building"></i> Commercial focused</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.partials.about-company', [
    'subtitle' => 'Trust & delivery',
    'title' => 'A dependable cleaning partner for professional spaces',
    'text' => 'Crestwell Facilities is structured for clients who need clear communication, consistent standards and the ability to scale from one-off work into recurring cleaning support.',
    'years' => '10',
    'buttonUrl' => route('frontend.contact'),
    'buttonText' => 'Get Free Quote',
    'features' => $trustPoints,
])

<section class="space" id="service-sec">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-end">
            <div class="col-lg">
                <div class="title-area text-center text-lg-start">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Core Services</span>
                    <h2 class="sec-title">Cleaning and facilities support for every property need</h2>
                </div>
            </div>
            <div class="col-lg-auto mt-n3 mt-lg-0">
                <div class="sec-btn">
                    <div class="icon-box">
                        <button data-slider-prev="#serviceSlider2" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
                        <button data-slider-next="#serviceSlider2" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper th-slider has-shadow" id="serviceSlider2" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
            <div class="swiper-wrapper">
                @foreach($services as $service)
                    <div class="swiper-slide">
                        <div class="service-box">
                            <div class="box-img"><img src="{{ asset('frontend/assets/img/'.$service->image) }}" alt="{{ $service->title }}"></div>
                            <div class="box-content">
                                <span class="cw-service-card-icon"><i class="{{ $service->iconClass }}"></i></span>
                                <h3 class="box-title"><a href="{{ route('frontend.services.show', $service->slug) }}">{{ $service->title }}</a></h3>
                                <div class="cw-service-card-footer">
                                    <span>{{ $service->excerpt }}</span>
                                    <a href="{{ route('frontend.services.show', $service->slug) }}" aria-label="Explore {{ $service->title }}"><i class="fas fa-arrow-up-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-5 text-center">
            <a href="{{ route('frontend.services.index') }}" class="th-btn">View All Services<i class="fas fa-arrow-up-right ms-2"></i></a>
        </div>
    </div>
</section>

<section class="space overflow-hidden cw-work-process">
    <div class="shape-mockup spin d-none d-lg-block" data-top="11%" data-left="-200px">
        <img src="{{ asset('frontend/assets/img/shape/vector_shape_8.png') }}" alt="shape">
    </div>
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">How It Works</span>
            <h2 class="sec-title">Simple enquiry, clear scope, reliable delivery</h2>
        </div>
        <div class="process-card2-wrap cw-process-card-wrap">
            @foreach($processSteps as $index => $step)
                @php($processImage = ['normal/process_card_1.jpg', 'normal/process_card_2.jpg', 'normal/process_card_3.jpg', 'normal/about_2_2.jpg'][$index % 4])
                <div class="process-card2 cw-process-card2">
                    <div class="box-img">
                        <img src="{{ asset('frontend/assets/img/'.$processImage) }}" alt="{{ $step['title'] }}">
                    </div>
                    <span class="cw-process-count">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="box-title">{{ $step['title'] }}</h3>
                    <p class="box-text">{{ $step['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="space cw-home-quote-section" id="quote-sec">
    <div class="container">
        <div class="row gy-5 gx-xl-5 align-items-center">
            <div class="col-lg-5">
                <div class="cw-home-quote-copy">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Get a Quote</span>
                    <h2 class="sec-title">Ready for a cleaner, better managed site?</h2>
                    <p class="sec-text">Share a few details about your property, schedule and cleaning requirement. Crestwell will review the scope and come back with the right next step.</p>
                    <div class="cw-home-quote-list">
                        <span><i class="fas fa-check"></i> Commercial and office cleaning</span>
                        <span><i class="fas fa-check"></i> Managed property and landlord support</span>
                        <span><i class="fas fa-check"></i> One-off, recurring and urgent service plans</span>
                    </div>
                    @include('frontend.partials.contact-action-buttons')
                </div>
            </div>
            <div class="col-lg-7">
                <div class="cw-quote-panel cw-home-form-panel">
                    <div class="cw-form-heading">
                        <span>Quick enquiry</span>
                        <h3>Request your free quote</h3>
                    </div>
                    @include('frontend.partials.quote-form')
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space">
    <div class="container">
        <div class="row gy-4 align-items-stretch">
            <div class="col-lg-6">
                <div class="cw-area-panel h-100">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Service Areas</span>
                    <h2 class="sec-title">Local cleaning support across commercial and property locations</h2>
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
            <div class="col-lg-6">
                <iframe class="cw-map h-100" src="{{ config('site.google_maps_embed') }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<section class="testi-area2 space bg-smoke" id="testi-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-md-9">
                <div class="title-area text-center">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Testimonials</span>
                    <h2 class="sec-title">Trusted by commercial, property and accommodation clients</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="testi-grid2-img">
                    <div class="swiper th-slider testi-grid2-thumb" id="testiSlideImg" data-slider-options='{"effect":"fade","spaceBetween":0}'>
                        <div class="swiper-wrapper">
                            @foreach($testimonials as $index => $testimonial)
                                @php($fallbackImage = 'testimonial/testi_5_'.(($index % 3) + 1).'.jpg')
                                <div class="swiper-slide"><img src="{{ asset('frontend/assets/img/'.($testimonial->image ?: $fallbackImage)) }}" alt="{{ $testimonial->name }}"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 align-self-center">
                <div class="testi-grid2-slide">
                    <div class="swiper th-slider" id="testiSlide3" data-slider-options='{"effect":"slide","thumbs":{"swiper":".testi-grid-thumb"}}'>
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
                    <div class="testi-grid2-quote"><i class="fa-solid fa-quote-right"></i></div>
                    <div class="icon-box">
                        <button data-slider-prev="#testiSlide3" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
                        <button data-slider-next="#testiSlide3" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.partials.google-review')

<section class="space cw-final-cta">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-8">
                <span class="cw-section-label">Start with a quote</span>
                <h2 class="sec-title text-white">Need a reliable cleaning partner for your site?</h2>
                <p class="cw-light-text mb-0">Call, WhatsApp or send the form and Crestwell will help define the right cleaning scope for your property.</p>
            </div>
            <div class="col-lg-4">
                @include('frontend.partials.contact-action-buttons')
            </div>
        </div>
    </div>
</section>
@endsection
