<footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('frontend/assets/img/bg/footer_bg_4.jpg') }}">
<div class="shape-mockup movingX d-none d-xl-block" data-bottom="80px" data-left="0%">
<img src="{{ asset('frontend/assets/img/shape/footer_shape_1.png') }}" alt="shape">
</div>
<div class="shape-mockup moving d-none d-xl-block" data-bottom="80px" data-right="5%">
<img src="{{ asset('frontend/assets/img/shape/footer_shape_2.png') }}" alt="shape">
</div>
<div class="container">
<div class="footer-top-wrap">
<div class="row gy-4 justify-content-between">
<div class="col-auto">
<div class="footer-contact">
<div class="box-icon">
<i class="fa-solid fa-location-dot">
</i>
</div>
<div class="box-content">
<h3 class="box-title">Address</h3>
<p class="box-text">{{ config('site.address') }}</p>
</div>
</div>
</div>
<div class="col-auto">
<div class="footer-contact">
<div class="box-icon">
<i class="fa-solid fa-phone">
</i>
</div>
<div class="box-content">
<h3 class="box-title">Contact</h3>
<p class="box-text">
<a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a> <a href="tel:{{ config('site.phone_link') }}">{{ config('site.phone') }}</a>
</p>
</div>
</div>
</div>
<div class="col-auto">
<div class="footer-contact">
<div class="box-icon">
<i class="fa-solid fa-clock">
</i>
</div>
<div class="box-content">
<h3 class="box-title">Hours</h3>
<p class="box-text">{!! config('site.business_hours') !!}</p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="widget-area">
<div class="container">
<div class="row justify-content-between">
<div class="col-md-6 col-xl-auto">
<div class="widget footer-widget">
<div class="th-widget-about">
<div class="about-logo">
<a href="{{ route('frontend.home') }}">
<img src="{{ asset('frontend/assets/img/'.config('site.logo_white')) }}" alt="{{ config('site.name') }}">
</a>
</div>
<p class="about-text">{{ config('site.footer_about') }}</p>
<div class="th-social">
<a href="{{ config('site.facebook_url') }}">
<i class="fab fa-facebook-f">
</i>
</a> <a href="{{ config('site.twitter_url') }}">
<i class="fab fa-twitter">
</i>
</a> <a href="{{ config('site.linkedin_url') }}">
<i class="fab fa-linkedin-in">
</i>
</a> <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('site.whatsapp')) }}">
<i class="fab fa-whatsapp">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-xl-auto">
<div class="widget widget_nav_menu footer-widget">
<h3 class="widget_title">Quick Links</h3>
<div class="menu-all-pages-container">
<ul class="menu">
<li>
<a href="{{ route('frontend.about') }}">About Us</a>
</li>
<li>
<a href="#">Our Services</a>
</li>
<li>
<a href="#">Faq's</a>
</li>
<li>
<a href="#">Privacy Policy</a>
</li>
<li>
<a href="#">Portfolio Us</a>
</li>
<li>
<a href="{{ route('frontend.contact') }}">Contact Us</a>
</li>
</ul>
</div>
</div>
</div>
<div class="col-md-6 col-xl-auto">
<div class="widget widget_nav_menu footer-widget">
<h3 class="widget_title">Our Services</h3>
<div class="menu-all-pages-container">
<ul class="menu">
<li>
<a href="{{ route('frontend.services.index') }}">Home Cleaning</a>
</li>
<li>
<a href="{{ route('frontend.services.index') }}">Office Cleaning</a>
</li>
<li>
<a href="{{ route('frontend.services.index') }}">Kitchen Cleaning</a>
</li>
<li>
<a href="{{ route('frontend.services.index') }}">Window Cleaning</a>
</li>
<li>
<a href="{{ route('frontend.services.index') }}">Bathroom Cleaning</a>
</li>
<li>
<a href="{{ route('frontend.services.index') }}">Wall Cleaning</a>
</li>
</ul>
</div>
</div>
</div>
<div class="col-md-6 col-xl-auto">
<div class="widget footer-widget">
<h3 class="widget_title">Get in touch!</h3>
<div class="newsletter-widget">
<p class="footer-text">{{ config('site.newsletter_text') }}</p>
<form action="javascript:void(0)" class="newsletter-form">
<div class="form-group">
<input class="form-control" type="email" placeholder="Enter email address" required="">
</div>
<button type="submit" class="icon-btn">
<i class="fa-solid fa-paper-plane">
</i>
</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="copyright-wrap">
<div class="container text-center">
<p class="copyright-text">Copyright <i class="fal fa-copyright">
</i> {{ date('Y') }} <a href="{{ route('frontend.home') }}">{{ config('site.name') }}</a>. All Rights Reserved.</p>
</div>
</div>
</footer>
<div class="scroll-top">
<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
</path>
</svg>
</div>
