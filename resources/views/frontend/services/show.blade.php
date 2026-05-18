@extends('frontend.layouts.app')

@section('content')
<section class="cw-service-hero" data-bg-src="{{ asset('frontend/assets/img/hero/hero_bg_5_3.jpg') }}">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-7">
                <ul class="breadcumb-menu cw-service-breadcrumb">
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li><a href="{{ route('frontend.services.index') }}">Services</a></li>
                    <li>{{ $service->title }}</li>
                </ul>
                <span class="cw-kicker">{{ config('site.tagline') }}</span>
                <h1>{{ $service->title }}</h1>
                <p>{{ $service->excerpt }}</p>
                <div class="cw-service-hero-actions">
                    <a href="#service-quote" class="th-btn star-btn">Get Free Quote<i class="fas fa-arrow-up-right ms-2"></i></a>
                    <a href="tel:{{ config('site.phone_link') }}" class="th-btn style6">Call {{ config('site.phone') }}<i class="fas fa-phone ms-2"></i></a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="cw-service-hero-card">
                    <span><i class="{{ $service->iconClass }}"></i></span>
                    <h2>Fast, clear and commercially focused</h2>
                    <p>Tell us the property type, location and frequency you need. Crestwell will help shape the right cleaning scope.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-8">
                <img class="cw-service-main-image mb-4" src="{{ asset('frontend/assets/img/'.$service->image) }}" alt="{{ $service->title }}">
                <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Crestwell Service</span>
                <h2 class="sec-title">{{ $service->title }} for clean, professional spaces</h2>
                <div class="service-rich-content">
                    @if(str_contains($service->description, '<'))
                        {!! $service->description !!}
                    @else
                        <p>{{ $service->description }}</p>
                    @endif
                </div>

                <div class="cw-benefit-grid mt-4">
                    @foreach($service->benefits as $benefit)
                        <div class="cw-benefit-item"><i class="fas fa-check"></i>{{ $benefit }}</div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area cw-service-sidebar">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget_title">All Services</h3>
                        <ul>
                            @foreach($services as $item)
                                <li><a href="{{ route('frontend.services.show', $item->slug) }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="cw-quote-panel">
                        <div class="cw-form-heading">
                            <span>Service quote</span>
                            <h3>Request {{ $service->title }}</h3>
                        </div>
                        @include('frontend.partials.quote-form', ['selectedService' => $service->title])
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<section class="space bg-smoke" id="service-quote">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-7">
                <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Book the next step</span>
                <h2 class="sec-title">Need {{ strtolower($service->title) }} for your property?</h2>
                <p class="sec-text">Use the form, call directly or send a WhatsApp enquiry with your location, property type and preferred schedule.</p>
            </div>
            <div class="col-lg-5">
                @include('frontend.partials.contact-action-buttons')
            </div>
        </div>
    </div>
</section>

<section class="space">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">FAQ</span>
            <h2 class="sec-title">{{ $service->title }} Questions</h2>
        </div>
        <div class="accordion" id="serviceFaq">
            @foreach($service->faqs as $index => $faq)
                <div class="accordion-card">
                    <div class="accordion-header" id="faq{{ $index }}">
                        <button class="accordion-button {{ $index ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $index }}">{{ $faq['question'] }}</button>
                    </div>
                    <div id="faqCollapse{{ $index }}" class="accordion-collapse collapse {{ $index ? '' : 'show' }}" data-bs-parent="#serviceFaq">
                        <div class="accordion-body"><p class="faq-text">{{ $faq['answer'] }}</p></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="testi-area2 space bg-smoke">
    <div class="container">
        <div class="title-area text-center"><span class="sub-title2">Testimonials</span><h2 class="sec-title">What Clients Say</h2></div>
        <div class="row gy-4">
            @foreach($testimonials as $testimonial)
                <div class="col-lg-4">
                    <div class="testi-grid2 h-100">
                        <div class="box-review">@for($i = 0; $i < $testimonial->rating; $i++)<i class="fa-sharp fa-solid fa-star"></i>@endfor</div>
                        <p class="box-text">{{ $testimonial->quote }}</p>
                        <h3 class="box-title">{{ $testimonial->name }}</h3>
                        <span class="box-desig">{{ $testimonial->role }}{{ $testimonial->company ? ', '.$testimonial->company : '' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
