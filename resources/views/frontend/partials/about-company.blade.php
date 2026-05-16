@php
    $aboutTitle = $title ?? 'Our Promise Is To Deliver Reliable Facilities Services';
    $aboutText = $text ?? 'Crestwell Facilities provides premium cleaning and facilities support for businesses, managed properties and residential spaces. We focus on consistency, professionalism and service delivery that protects how your spaces look, feel and perform.';
    $experienceYears = $years ?? '10';
    $buttonUrl = $buttonUrl ?? route('frontend.about');
    $buttonText = $buttonText ?? 'Discover More';
    $features = $features ?? [
        'Commercial cleaning standards',
        'Vetted professional teams',
        'Reliable facilities support',
        'Quote, call and WhatsApp response',
    ];
@endphp

<div class="space overflow-hidden" id="about-sec">
    <div class="shape-mockup jump" data-top="15%" data-left="0%">
        <img src="{{ asset('frontend/assets/img/shape/vector_shape_6.png') }}" alt="shape">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 mb-30 mb-xl-0">
                <div class="pe-xxl-5">
                    <div class="img-box5">
                        <div class="img1">
                            <img src="{{ asset('frontend/assets/img/normal/about_2_1.jpg') }}" alt="Crestwell Facilities cleaning professional">
                        </div>
                        <div class="year-box">
                            <div class="box-number"><span class="counter-number">{{ $experienceYears }}</span></div>
                            <h4 class="box-title">Years <br> Experience</h4>
                        </div>
                        <div class="img2">
                            <img src="{{ asset('frontend/assets/img/normal/about_2_2.jpg') }}" alt="Crestwell Facilities cleaning team">
                        </div>
                        <div class="shape1">
                            <img src="{{ asset('frontend/assets/img/normal/dots.png') }}" alt="Dots">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 text-xl-start text-center">
                <div class="title-area mb-32">
                    <span class="sub-title2">
                        <img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">About Company
                    </span>
                    <h2 class="sec-title">{!! $aboutTitle !!}</h2>
                    <p class="sec-text">{{ $aboutText }}</p>
                </div>
                <div class="checklist style3 list-two-column mb-30">
                    <ul>
                        @foreach($features as $feature)
                            <li><i class="fas fa-shield-check"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
                <a href="{{ $buttonUrl }}" class="th-btn star-btn">{{ $buttonText }}<i class="fas fa-arrow-up-right ms-2"></i></a>
            </div>
        </div>
    </div>
</div>
