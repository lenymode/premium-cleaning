@extends('frontend.layouts.app')

@section('content')
<section class="breadcumb-wrapper" data-bg-src="{{ asset('frontend/assets/img/hero/hero_bg_5_3.jpg') }}">
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

<div class="overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row gy-30 align-items-center">
            <div class="col-xl-7 mb-xl-0">
                <div class="img-box1">
                    <div class="img1 jump-reverse">
                        <img src="{{ asset('frontend/assets/img/normal/about_2_1.jpg') }}" alt="Crestwell Facilities cleaner">
                    </div>
                    <div class="shape1 jump">
                        <img src="{{ asset('frontend/assets/img/normal/process_card_1.jpg') }}" alt="Commercial cleaning support">
                    </div>
                    <div class="img2">
                        <img class="tilt-active" src="{{ asset('frontend/assets/img/normal/about_2_2.jpg') }}" alt="Crestwell Facilities cleaning professional">
                        <div class="about-play-btn-wrap">
                            <a href="{{ route('frontend.contact') }}" class="play-btn style2">
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
                <div class="title-area">
                    <span class="sub-title before-none">About Us</span>
                    <h2 class="sec-title">Commercial Cleaning Built Around Reliability</h2>
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
                <div>
                    <a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Get Free Quote</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="counter-sec1 space-bottom">
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

<section class="space" id="process-sec" data-bg-src="{{ asset('frontend/assets/img/bg/counter_bg_1.jpg') }}">
    <div class="shape-mockup jump process-3-shape-1">
        <img src="{{ asset('frontend/assets/img/shape/vector_shape_7.png') }}" alt="shape">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center text-xl-start">
                <div class="title-area">
                    <span class="sub-title before-none style-theme2 lg-after-none justify-content-center justify-content-xl-start">Work Process</span>
                    <h2 class="sec-title text-white">How We Work</h2>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach([
                ['icon' => 'fa-solid fa-address-card', 'title' => 'Enquiry', 'text' => 'Tell us the property type, location, service need and preferred cleaning schedule.'],
                ['icon' => 'fa-regular fa-calendar-clock', 'title' => 'Quote & Schedule', 'text' => 'We confirm the scope, frequency and timing so expectations are clear before work begins.'],
                ['icon' => 'fa-sharp fa-solid fa-handshake', 'title' => 'Service Delivery', 'text' => 'Managed cleaners deliver the agreed cleaning standard with practical communication.'],
                ['icon' => 'fa-solid fa-broom', 'title' => 'Ongoing Support', 'text' => 'Scale from one-off work to recurring cleaning and facilities support as your needs grow.'],
            ] as $step)
                <div class="col-xl-3 col-md-6 process-box-wrap">
                    <div class="process-box style-3">
                        <div class="box-icon"><i class="{{ $step['icon'] }}"></i></div>
                        <h3 class="box-title text-white">{{ $step['title'] }}</h3>
                        <p class="box-text text-white">{{ $step['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('frontend.partials.about-company', [
    'title' => 'A Scalable Cleaning Partner For <span class="text-theme">Professional Spaces</span>',
    'text' => 'Crestwell Facilities is designed as a reliable service infrastructure brand, supporting commercial premises, managed properties, serviced accommodation and residential requirements with structured, consistent cleaning delivery.',
    'years' => '10',
    'buttonUrl' => route('frontend.contact'),
    'buttonText' => 'Get Free Quote',
    'features' => [
        'Reliability-focused operations',
        'Vetted and managed cleaners',
        'Commercial and property support',
        'Scalable recurring service plans',
    ],
])

<section class="team-area-1 space bg-smoke" id="team-sec">
    <div class="container z-index-common">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-9">
                <div class="title-area text-center">
                    <span class="sub-title style-3 justify-content-center"><span class="left"></span> Team Members <span class="right"></span></span>
                    <h2 class="sec-title">Professionally Managed Cleaning Teams</h2>
                </div>
            </div>
        </div>
        <div class="row gy-40 justify-content-center">
            @foreach([
                ['image' => 'team/team_2_1.jpg', 'name' => 'Commercial Team', 'role' => 'Office & Facilities Cleaning'],
                ['image' => 'team/team_2_2.jpg', 'name' => 'Property Team', 'role' => 'Tenancy & Managed Property'],
                ['image' => 'team/team_2_3.jpg', 'name' => 'Accommodation Team', 'role' => 'Airbnb & Serviced Apartments'],
                ['image' => 'team/team_2_4.jpg', 'name' => 'Specialist Team', 'role' => 'Deep & Emergency Cleaning'],
            ] as $member)
                <div class="col-xl-3 col-md-6 team-diff-color">
                    <div class="team-card style-2">
                        <div class="team-img">
                            <img src="{{ asset('frontend/assets/img/'.$member['image']) }}" alt="{{ $member['name'] }}">
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
</section>

<section class="space">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="cw-quote-panel h-100">
                    <h2>Mission</h2>
                    <p>To deliver dependable cleaning and facilities support that helps commercial, property and residential spaces stay clean, organised and ready to make a strong impression.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cw-quote-panel h-100">
                    <h2>Vision</h2>
                    <p>To become a trusted facilities service brand known for professionalism, consistency and scalable service delivery across multiple property sectors.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
