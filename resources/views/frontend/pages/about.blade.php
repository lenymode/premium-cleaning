@extends('frontend.layouts.app')

@php
    $metaTitle = 'About Crestwell Facilities | Commercial Cleaning & Facilities Support';
    $metaDescription = 'Learn how Crestwell Facilities delivers reliable commercial cleaning, property cleaning and facilities support with professional standards, vetted teams and scalable service delivery.';
@endphp

@section('content')
<section class="breadcumb-wrapper cw-about-breadcrumb" data-bg-src="{{ asset('frontend/assets/img/hero/hero_bg_5_3.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</section>

<section class="overflow-hidden space cw-about-intro" id="about-sec">
    <div class="shape-mockup jump d-none d-xxl-block" data-top="16%" data-left="2%">
        <img src="{{ asset('frontend/assets/img/shape/vector_shape_1.png') }}" alt="shape">
    </div>
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-xl-7">
                <div class="img-box1 cw-about-img-box">
                    <div class="img1 jump-reverse">
                        <img src="{{ asset('frontend/assets/img/normal/about_2_1.jpg') }}" alt="Crestwell Facilities commercial cleaner preparing a professional space">
                    </div>
                    <div class="shape1 jump">
                        <img src="{{ asset('frontend/assets/img/normal/process_card_1.jpg') }}" alt="Detailed cleaning service for managed facilities">
                    </div>
                    <div class="img2">
                        <img class="tilt-active" src="{{ asset('frontend/assets/img/normal/about_2_2.jpg') }}" alt="Crestwell cleaner delivering property cleaning standards">
                        <div class="about-play-btn-wrap">
                            <a href="tel:{{ config('site.phone_link') }}" class="play-btn style2" aria-label="Call Crestwell Facilities">
                                <i class="fa-sharp fa-solid fa-phone"></i>
                            </a>
                        </div>
                    </div>
                    <div class="year-counter">
                        <div class="rotate-text">
                            <h5 class="year-counter_text-small">Years Of</h5>
                            <h4 class="year-counter_text-big">Experience</h4>
                        </div>
                        <div class="year-counter_number">
                            <span class="counter-number">10</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="title-area mb-32">
                    <span class="sub-title2">
                        <img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">About Crestwell
                    </span>
                    <h2 class="sec-title">Commercial Cleaning Built Around <span class="text-theme">Reliability</span></h2>
                    <p class="sec-text">Crestwell Facilities is a professional cleaning and facilities support brand for businesses, property managers, landlords, serviced accommodation operators and residential clients who expect consistent standards.</p>
                    <p class="sec-text">We are building a scalable service infrastructure around clean communication, dependable teams and spaces that create strong first impressions.</p>
                </div>
                <div class="checklist style2 mb-35">
                    <ul>
                        <li><i class="fa-solid fa-circle"></i> Commercial, office and managed property cleaning</li>
                        <li><i class="fa-solid fa-circle"></i> Vetted and professionally managed cleaners</li>
                        <li><i class="fa-solid fa-circle"></i> One-off, recurring and urgent cleaning support</li>
                        <li><i class="fa-solid fa-circle"></i> Quote, phone and WhatsApp enquiry routes</li>
                    </ul>
                </div>
                <div class="btn-group">
                    <a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Get Free Quote<i class="fas fa-arrow-up-right ms-2"></i></a>
                    <a href="tel:{{ config('site.phone_link') }}" class="th-btn star-btn cw-about-call-btn">Call Now<i class="fas fa-phone ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="counter-sec1 space-bottom cw-about-counter-sec">
    <div class="container">
        <div class="counter-card-wrap space">
            <div class="counter-card">
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">9</span>+</h2>
                    <p class="box-text">Core Cleaning Services</p>
                </div>
            </div>
            <div class="right-shape"><img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="Shape"></div>
            <div class="counter-card">
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">24</span>/7</h2>
                    <p class="box-text">Enquiry Support</p>
                </div>
            </div>
            <div class="right-shape"><img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="Shape"></div>
            <div class="counter-card">
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">100</span>%</h2>
                    <p class="box-text">Standards Focused</p>
                </div>
            </div>
            <div class="right-shape"><img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="Shape"></div>
        </div>
    </div>
</div>

<section class="space-bottom cw-about-service-story">
    <div class="container">
        <div class="row gy-30 align-items-end justify-content-between">
            <div class="col-xl-6 col-lg-8">
                <div class="title-area">
                    <span class="sub-title2">
                        <img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Service Infrastructure
                    </span>
                    <h2 class="sec-title">A Cleaning Partner for Commercial, Property and Residential Needs</h2>
                </div>
            </div>
            <div class="col-xl-5 col-lg-8">
                <p class="sec-text cw-about-section-lead">Every space has its own operating rhythm. Crestwell shapes the service around your building type, access requirements, cleaning frequency and presentation standards.</p>
            </div>
        </div>
        <div class="row gy-4">
            @foreach([
                ['image' => 'uploads/services/office-cleaning-20260517200658-Q2eice.jpg', 'icon' => 'fa-solid fa-building', 'title' => 'Workplace Cleaning', 'text' => 'Routine office and commercial cleaning that protects staff experience, client impressions and daily presentation.'],
                ['image' => 'uploads/services/end-of-tenancy-cleaning-services-cardiff-20260517200937-IAYzUE.jpg', 'icon' => 'fa-solid fa-key', 'title' => 'Property Turnarounds', 'text' => 'End of tenancy, landlord and managed property support with a practical focus on inspection readiness.'],
                ['image' => 'uploads/services/a-cleaner-is-cleaning-an-airbnb-and-performing-various-cleaning-tasks-20260517201029-8YkUMy.png', 'icon' => 'fa-solid fa-house-user', 'title' => 'Guest Ready Spaces', 'text' => 'Airbnb and serviced accommodation cleaning for operators who need reliable changeovers and consistent standards.'],
            ] as $item)
                <div class="col-lg-4">
                    <article class="cw-about-service-card">
                        <div class="box-img">
                            <img src="{{ asset('frontend/assets/img/' . $item['image']) }}" alt="{{ $item['title'] }}">
                        </div>
                        <div class="box-content">
                            <span class="cw-service-card-icon"><i class="{{ $item['icon'] }}"></i></span>
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['text'] }}</p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="space cw-about-process" id="process-sec" data-bg-src="{{ asset('frontend/assets/img/bg/counter_bg_1.jpg') }}">
    <div class="shape-mockup jump process-3-shape-1 d-none d-xl-block">
        <img src="{{ asset('frontend/assets/img/shape/vector_shape_7.png') }}" alt="shape">
    </div>
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-xl-4">
                <div class="title-area mb-xl-0">
                    <span class="sub-title before-none style-theme2">Work Process</span>
                    <h2 class="sec-title text-white">How We Keep Cleaning Simple and Accountable</h2>
                    <p class="sec-text text-white">From first enquiry to ongoing support, the process is structured so clients always know what is happening next.</p>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="cw-about-process-grid">
                    @foreach([
                        ['icon' => 'fa-solid fa-address-card', 'title' => 'Enquiry', 'text' => 'Tell us the property type, location, service need and preferred cleaning schedule.'],
                        ['icon' => 'fa-regular fa-calendar-clock', 'title' => 'Quote & Schedule', 'text' => 'We confirm the scope, frequency and timing so expectations are clear before work begins.'],
                        ['icon' => 'fa-sharp fa-solid fa-handshake', 'title' => 'Service Delivery', 'text' => 'Managed cleaners deliver the agreed cleaning standard with practical communication.'],
                        ['icon' => 'fa-solid fa-broom', 'title' => 'Ongoing Support', 'text' => 'Scale from one-off work to recurring cleaning and facilities support as your needs grow.'],
                    ] as $step)
                        <div class="process-box style-3 cw-about-process-box">
                            <div class="box-icon"><i class="{{ $step['icon'] }}"></i></div>
                            <h3 class="box-title text-white">{{ $step['title'] }}</h3>
                            <p class="box-text text-white">{{ $step['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space cw-about-mission">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-xl-6">
                <div class="cw-about-image-stack">
                    <img class="cw-about-image-stack-main" src="{{ asset('frontend/assets/img/uploads/services/industrial-facility-cleaning-services-atlanta-ga-640w-20260517201518-wo68iT.webp') }}" alt="Industrial and facilities cleaning support">
                    <img class="cw-about-image-stack-small" src="{{ asset('frontend/assets/img/normal/process_card_3.jpg') }}" alt="Professional cleaning tools and detail work">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="cw-mission-card cw-mission-primary">
                            <span>Mission</span>
                            <h3>Clean, organised and ready spaces.</h3>
                            <p>To deliver dependable cleaning and facilities support that helps every property make a strong first impression.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cw-mission-card">
                            <span>Vision</span>
                            <h3>A trusted facilities service brand.</h3>
                            <p>To become known for professionalism, consistency and scalable service delivery across multiple property sectors.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="cw-about-feature-band">
                            <div>
                                <i class="fa-solid fa-shield-check"></i>
                                <strong>Insured Service</strong>
                            </div>
                            <div>
                                <i class="fa-solid fa-user-check"></i>
                                <strong>Vetted Cleaners</strong>
                            </div>
                            <div>
                                <i class="fa-solid fa-calendar-check"></i>
                                <strong>Flexible Contracts</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space cw-about-values bg-smoke">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9">
                <div class="title-area text-center">
                    <span class="sub-title2">
                        <img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Our Values
                    </span>
                    <h2 class="sec-title">Professional Standards You Can Feel in the Details</h2>
                </div>
            </div>
        </div>
        <div class="row gy-4">
            @foreach([
                ['icon' => 'fa-solid fa-clock', 'title' => 'Reliable Attendance', 'text' => 'Cleaners arrive prepared, briefed and ready to keep the service moving without friction.'],
                ['icon' => 'fa-solid fa-clipboard-check', 'title' => 'Consistent Standards', 'text' => 'Repeatable outcomes matter more than random effort, especially across recurring sites.'],
                ['icon' => 'fa-solid fa-comments', 'title' => 'Clear Communication', 'text' => 'Quotes, updates and next steps are kept direct, practical and easy to act on.'],
                ['icon' => 'fa-solid fa-layer-group', 'title' => 'Scalable Support', 'text' => 'Crestwell can support single spaces, recurring offices and wider managed property needs.'],
            ] as $value)
                <div class="col-md-6 col-xl-3">
                    <div class="cw-value-card">
                        <span><i class="{{ $value['icon'] }}"></i></span>
                        <h3>{{ $value['title'] }}</h3>
                        <p>{{ $value['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="space cw-about-team">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-xl-5">
                <div class="title-area mb-32">
                    <span class="sub-title2">
                        <img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Managed Teams
                    </span>
                    <h2 class="sec-title">Specialist Cleaning Support for Different Property Types</h2>
                    <p class="sec-text">Crestwell brings together cleaners and service categories around the real environments clients manage: workplaces, tenancy handovers, guest accommodation, homes and urgent cleaning needs.</p>
                </div>
                <a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Discuss Your Site<i class="fas fa-arrow-up-right ms-2"></i></a>
            </div>
            <div class="col-xl-7">
                <div class="row gy-4">
                    @foreach([
                        ['image' => 'team/team_2_1.jpg', 'name' => 'Commercial Team', 'role' => 'Office & Facilities Cleaning'],
                        ['image' => 'team/team_2_2.jpg', 'name' => 'Property Team', 'role' => 'Tenancy & Managed Property'],
                        ['image' => 'team/team_2_3.jpg', 'name' => 'Accommodation Team', 'role' => 'Airbnb & Serviced Apartments'],
                        ['image' => 'team/team_2_4.jpg', 'name' => 'Specialist Team', 'role' => 'Deep & Emergency Cleaning'],
                    ] as $member)
                        <div class="col-sm-6">
                            <div class="team-card style-2 cw-about-team-card">
                                <div class="team-img">
                                    <img src="{{ asset('frontend/assets/img/' . $member['image']) }}" alt="{{ $member['name'] }}">
                                </div>
                                <div class="team-content">
                                    <h3 class="box-title"><a href="{{ route('frontend.contact') }}">{{ $member['name'] }}</a></h3>
                                    <span class="team-desig">{{ $member['role'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cw-about-quote space">
    <div class="container">
        <div class="contact-sec1 cw-about-contact-card">
            <div class="shape-mockup spin d-none d-xl-block" data-bottom="-35%" data-left="30%">
                <img src="{{ asset('frontend/assets/img/shape/vector_shape_5.png') }}" alt="shape">
            </div>
            <div class="row gy-40 align-items-center">
                <div class="col-xl-5">
                    <div class="title-area mb-32">
                        <span class="sub-title2">
                            <img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Start a Conversation
                        </span>
                        <h2 class="sec-title text-white">Tell Us What Your Space Needs</h2>
                        <p class="sec-text text-white">Use the form for commercial cleaning, office cleaning, property cleaning, facilities support or residential cleaning enquiries. Crestwell will respond with clear next steps.</p>
                    </div>
                    <div class="btn-group cw-about-quote-actions">
                        <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('site.whatsapp')) }}" class="cw-navbar-whatsapp">WhatsApp Inquiry<i class="fab fa-whatsapp"></i></a>
                        <a href="tel:{{ config('site.phone_link') }}" class="th-btn star-btn cw-about-call-btn">Call Now<i class="fas fa-phone ms-2"></i></a>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="cw-about-form-panel">
                        @include('frontend.partials.quote-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
