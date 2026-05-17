<footer class="footer-wrapper footer-layout4" data-bg-src="{{ asset('frontend/assets/img/bg/footer_bg_2.jpg') }}">
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-4">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/logo-white.png') }}" alt="{{ config('site.name') }}"></a></div>
                            <p class="about-text">{{ config('site.name') }} delivers premium cleaning and facilities support for commercial spaces, managed properties and residential requirements.</p>
                            <div class="th-social"><a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-linkedin-in"></i></a> <a href="#"><i class="fab fa-instagram"></i></a> <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('site.whatsapp')) }}"><i class="fab fa-whatsapp"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Quick Links</h3>
                        <ul class="menu">
                            <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                            <li><a href="{{ route('frontend.services.index') }}">Our Services</a></li>
                            <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('login') }}">Client Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Core Services</h3>
                        <ul class="menu">
                            @foreach(array_slice(app(\App\Services\Frontend\ServicePageService::class)->all(), 0, 6) as $footerService)
                                <li><a href="{{ route('frontend.services.show', $footerService->slug) }}">{{ $footerService->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Contact</h3>
                        <p class="footer-info"><i class="fas fa-phone"></i> <a href="tel:{{ config('site.phone_link') }}">{{ config('site.phone') }}</a></p>
                        <p class="footer-info"><i class="fas fa-envelope"></i> <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></p>
                        <p class="footer-info"><i class="fas fa-location-dot"></i> {{ config('site.address') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row gy-2 align-items-center">
                <div class="col-md-6"><p class="copyright-text">Copyright {{ date('Y') }} <a href="{{ route('frontend.home') }}">{{ config('site.name') }}</a>. All Rights Reserved.</p></div>
                <div class="col-md-6 text-center text-md-end"><div class="footer-links"><ul><li><a href="{{ route('frontend.contact') }}">Get Quote</a></li><li><a href="{{ route('frontend.services.index') }}">Services</a></li></ul></div></div>
            </div>
        </div>
    </div>
</footer>

<div class="cw-sticky-mobile">
    <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('site.whatsapp')) }}" class="cw-sticky-whatsapp">
        <span><i class="fab fa-whatsapp"></i></span>
        <strong>WhatsApp</strong>
    </a>
    <a href="tel:{{ config('site.phone_link') }}" class="cw-sticky-call">
        <span><i class="fas fa-phone"></i></span>
        <strong>Call Now</strong>
    </a>
</div>
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path></svg>
</div>
