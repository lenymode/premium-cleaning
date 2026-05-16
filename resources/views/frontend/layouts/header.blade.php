@php
    $navServices = app(\App\Services\Frontend\ServicePageService::class)->all();
@endphp

<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/logo.png') }}" alt="{{ config('site.name') }}"></a></div>
        <div class="th-mobile-menu">
            <ul>
                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                <li class="menu-item-has-children"><a href="{{ route('frontend.services.index') }}">Services</a>
                    <ul class="sub-menu">
                        @foreach($navServices as $navService)
                            <li><a href="{{ route('frontend.services.show', $navService->slug) }}">{{ $navService->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</div>

<header class="th-header header-layout4">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li><i class="fas fa-phone"></i><b>Phone:</b><a href="tel:{{ config('site.phone_link') }}">{{ config('site.phone') }}</a></li>
                            <li><i class="fas fa-envelope"></i><b>Email:</b><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-links">
                        <ul>
                            <li><div class="social-links"><a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-linkedin-in"></i></a> <a href="#"><i class="fab fa-instagram"></i></a> <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('site.whatsapp')) }}"><i class="fab fa-whatsapp"></i></a></div></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/logo.png') }}" alt="{{ config('site.name') }}"></a></div>
                    </div>
                    <div class="col-auto d-none d-lg-inline-block">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                                <li class="menu-item-has-children"><a href="{{ route('frontend.services.index') }}">Services</a>
                                    <ul class="sub-menu cw-service-mega-menu">
                                        @foreach($navServices as $navService)
                                            <li>
                                                <a class="cw-mega-link" href="{{ route('frontend.services.show', $navService->slug) }}">
                                                    <span class="cw-mega-icon"><i class="{{ $navService->iconClass }}"></i></span>
                                                    <span class="cw-mega-copy">
                                                        <span class="cw-mega-title">{{ $navService->title }}</span>
                                                        <span class="cw-mega-text">{{ str($navService->excerpt)->limit(34) }}</span>
                                                    </span>
                                                    <span class="cw-mega-arrow"><i class="fa-solid fa-arrow-right"></i></span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto">
                        <div class="header-button">
                            <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('site.whatsapp')) }}" class="cw-whatsapp-btn d-none d-xl-inline-flex">WhatsApp Enquiry<i class="fab fa-whatsapp ms-3"></i></a>
                            <a href="tel:{{ config('site.phone_link') }}" class="cw-header-call-btn d-none d-xl-inline-flex">Call Now<i class="fas fa-phone ms-2"></i></a>
                            <a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Get Free Quote<i class="fas fa-arrow-up-right ms-2"></i></a>
                            <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
