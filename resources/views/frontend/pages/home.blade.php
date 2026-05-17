@extends('frontend.layouts.app')

@section('content')
<div class="th-hero-wrapper hero-4" id="hero" data-bg-src="{{ asset('frontend/assets/img/hero/hero_bg_4_1.jpg') }}">
<div class="hero-inner">
<div class="container">
<div class="hero-style4">
<span class="sub-title2">
<img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Crestwell Facilities</span>
<h1 class="hero-title">
<span class="title1">Clean Spaces.</span>
<span class="title2">Strong <span class="wave-title">Impressions</span></span>
</h1>
<div class="cw-hero-actions">
<a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Get Free Quote<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
<a href="tel:{{ config('site.phone_link') }}" class="th-btn star-btn cw-hero-call">Call Now<i class="fas fa-phone ms-2">
</i>
</a>
</div>
<div class="cw-hero-trust-badges" aria-label="Crestwell Facilities service assurances">
<span><i class="fa-solid fa-shield-check"></i> Insured Service</span>
<span><i class="fa-solid fa-user-check"></i> Vetted Cleaners</span>
<span><i class="fa-solid fa-calendar-check"></i> Flexible Contracts</span>
</div>
<div class="hero-counter-wrap">
<div class="hero-counter">
<div class="box-number">
<span class="counter-number">55</span>k+</div>
<p class="box-text">Project Completed</p>
</div>
<div class="hero-counter">
<div class="box-number">
<span class="counter-number">150</span>+</div>
<p class="box-text">Expert Cleaner</p>
</div>
<div class="hero-counter">
<div class="box-number">
<span class="counter-number">50</span>k+</div>
<p class="box-text">Satisfied Customer</p>
</div>
</div>
</div>
</div>
<div class="hero-img">
<img src="{{ asset('frontend/assets/img/hero/hero_4_1.png') }}" alt="Crestwell Facilities cleaning professional">
</div>
<div class="hero-shape1">
<img src="{{ asset('frontend/assets/img/hero/hero_shape_2_1.svg') }}" alt="shape">
</div>
<div class="hero-shape2">
<img src="{{ asset('frontend/assets/img/hero/hero_shape_2_2.svg') }}" alt="shape">
</div>
<img src="{{ asset('frontend/assets/img/hero/bubble_3.png') }}" alt="bubble" class="bubble bubble_1"> <img src="{{ asset('frontend/assets/img/hero/bubble_5.png') }}" alt="bubble" class="bubble bubble_2"> <img src="{{ asset('frontend/assets/img/hero/bubble_4.png') }}" alt="bubble" class="bubble bubble_3"> <img src="{{ asset('frontend/assets/img/hero/bubble_2.png') }}" alt="bubble" class="bubble bubble_4"> <img src="{{ asset('frontend/assets/img/hero/bubble_5.png') }}" alt="bubble" class="bubble bubble_5">
</div>
</div>
<section class="space-top" id="service-sec">
<div class="shape-mockup jump d-none d-xxl-block" data-top="15%" data-left="2%">
<img src="{{ asset('frontend/assets/img/shape/tool_shape_1.png') }}" alt="shape">
</div>
<div class="shape-mockup jump-reverse" data-top="10%" data-right="0%">
<img src="{{ asset('frontend/assets/img/shape/vector_shape_1.png') }}" alt="shape">
</div>
<div class="container">
<div class="row justify-content-lg-between justify-content-center align-items-end">
<div class="col-lg">
<div class="title-area text-center text-lg-start">
<span class="sub-title2">
<img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Our Services</span>
<h2 class="sec-title">Trusted Cleaning <span class="text-theme">Service</span>
<br>On Your Door</h2>
</div>
</div>
<div class="col-lg-auto mt-n3 mt-lg-0">
<div class="sec-btn">
<div class="icon-box">
<button data-slider-prev="#serviceSlider1" class="slider-arrow default">
<i class="far fa-arrow-left">
</i>
</button> <button data-slider-next="#serviceSlider1" class="slider-arrow default">
<i class="far fa-arrow-right">
</i>
</button>
</div>
</div>
</div>
</div>
<div class="swiper th-slider has-shadow" id="serviceSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
<div class="swiper-wrapper">
<div class="swiper-slide">
<div class="service-card2">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/service/service_card_1.jpg') }}" alt="Image">
</div>
<div class="box-content">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/service_card_1.svg') }}" alt="Icon">
</div>
<h3 class="box-title">
<a href="{{ route('frontend.services.index') }}">Home Cleaning</a>
</h3>
<p class="box-text">General Cleaning is a House a cleaning this includes dusting, floors, wiping.</p>
<a href="{{ route('frontend.services.index') }}" class="th-btn btn-sm">See More<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="service-card2">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/service/service_card_2.jpg') }}" alt="Image">
</div>
<div class="box-content">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/service_card_2.svg') }}" alt="Icon">
</div>
<h3 class="box-title">
<a href="{{ route('frontend.services.index') }}">Kitchen Cleaning</a>
</h3>
<p class="box-text">General Cleaning is a House a cleaning this includes dusting, floors, wiping.</p>
<a href="{{ route('frontend.services.index') }}" class="th-btn btn-sm">See More<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="service-card2">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/service/service_card_3.jpg') }}" alt="Image">
</div>
<div class="box-content">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/service_card_3.svg') }}" alt="Icon">
</div>
<h3 class="box-title">
<a href="{{ route('frontend.services.index') }}">Window Cleaning</a>
</h3>
<p class="box-text">General Cleaning is a House a cleaning this includes dusting, floors, wiping.</p>
<a href="{{ route('frontend.services.index') }}" class="th-btn btn-sm">See More<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="service-card2">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/service/service_card_4.jpg') }}" alt="Image">
</div>
<div class="box-content">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/service_card_4.svg') }}" alt="Icon">
</div>
<h3 class="box-title">
<a href="{{ route('frontend.services.index') }}">Bathroom Cleaning</a>
</h3>
<p class="box-text">General Cleaning is a House a cleaning this includes dusting, floors, wiping.</p>
<a href="{{ route('frontend.services.index') }}" class="th-btn btn-sm">See More<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="service-card2">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/service/service_card_5.jpg') }}" alt="Image">
</div>
<div class="box-content">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/service_card_5.svg') }}" alt="Icon">
</div>
<h3 class="box-title">
<a href="{{ route('frontend.services.index') }}">Plumbing Service</a>
</h3>
<p class="box-text">General Cleaning is a House a cleaning this includes dusting, floors, wiping.</p>
<a href="{{ route('frontend.services.index') }}" class="th-btn btn-sm">See More<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="service-card2">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/service/service_card_6.jpg') }}" alt="Image">
</div>
<div class="box-content">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/service_card_6.svg') }}" alt="Icon">
</div>
<h3 class="box-title">
<a href="{{ route('frontend.services.index') }}">Office Cleaning</a>
</h3>
<p class="box-text">General Cleaning is a House a cleaning this includes dusting, floors, wiping.</p>
<a href="{{ route('frontend.services.index') }}" class="th-btn btn-sm">See More<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<div class="z-index-common overflow-hidden space" id="about-sec">
<div class="shape-mockup moving d-none d-xl-block z-index-3" data-bottom="-40px" data-right="0">
<img src="{{ asset('frontend/assets/img/shape/vector_shape_3.png') }}" alt="shape">
</div>
<div class="container">
<div class="row align-items-center">
<div class="col-xl-6 mb-30 mb-xl-0">
<div class="img-box3">
<div class="img1">
<img src="{{ asset('frontend/assets/img/normal/about_1_1.jpg') }}" alt="About">
</div>
<div class="right-half">
<div class="feature-circle">
<div class="progressbar">
<div class="circle" data-percent="90">
<div class="circle-num">
</div>
</div>
<h3 class="box-title">Project Done</h3>
</div>
</div>
<div class="img2">
<img src="{{ asset('frontend/assets/img/normal/about_1_2.jpg') }}" alt="About">
</div>
</div>
<div class="box-shape spin">
<img src="{{ asset('frontend/assets/img/shape/vector_shape_2.png') }}" alt="img">
</div>
</div>
</div>
<div class="col-xl-6">
<div class="title-area mb-32">
<span class="sub-title2">
<img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">About Us</span>
<h2 class="sec-title">Over 35 Years Leading in <span class="text-theme">Cleaning</span> Industry</h2>
<p class="sec-text">Welcome to our cleaning service company, where we bring over 25 years of expertise to every job. Our dedicated team ensures your space is impeccably clean, creating a healthier environment for all. where we bring over 25 years of expertise to every dedicated job.</p>
</div>
<div class="about-feature2-wrap">
<div class="about-feature2">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/about_feature_1.svg') }}" alt="icon">
</div>
<div class="media-body">
<h3 class="box-title">Modern Technology</h3>
<p class="box-text">We Use Modern Technology Cleaner for our customer</p>
</div>
</div>
<div class="about-feature2">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/about_feature_2.svg') }}" alt="icon">
</div>
<div class="media-body">
<h3 class="box-title">Expert Team</h3>
<p class="box-text">Our expert team skill is very high & they work carefully</p>
</div>
</div>
</div>
<div class="btn-group">
<a href="{{ route('frontend.about') }}" class="th-btn">More Details<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
<div class="about-signature">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/normal/about_author.jpg') }}" alt="Image">
</div>
<div class="signature">
<img src="{{ asset('frontend/assets/img/normal/about_signature.jpg') }}" alt="Image">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="video-sec1 space-top" data-bg-src="{{ asset('frontend/assets/img/bg/video_bg_1.jpg') }}">
<div class="shape-mockup starani" data-top="10%" data-left="20%">
<img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape">
</div>
<div class="shape-mockup starani" data-bottom="22%" data-left="6%">
<img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape">
</div>
<div class="shape-mockup starani" data-top="15%" data-right="10%">
<img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape">
</div>
<div class="shape-mockup starani" data-bottom="12%" data-right="6%">
<img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape">
</div>
<div class="container">
<div class="row text-center justify-content-center">
<div class="col-xl-7 col-lg-8 col-md-11">
<div class="mb-5 pb-3">
<a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video">
<i class="fa-sharp fa-solid fa-play">
</i>
</a>
</div>
<h2 class="sec-title text-white">Prioritizes Cleanliness and Offers Top-Notch Service</h2>
</div>
</div>
</div>
</div>
<div class="">
<div class="container">
<div class="contact-sec1">
<div class="shape-mockup spin d-none d-xl-block" data-bottom="-35%" data-left="30%">
<img src="{{ asset('frontend/assets/img/shape/vector_shape_5.png') }}" alt="shape">
</div>
<div class="row gy-40">
<div class="col-xl-7">
<div class="pe-xl-4 text-xl-start text-center">
<div class="title-area mb-32">
<span class="sub-title2">
<img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Get In touch</span>
<h2 class="sec-title text-white">Our Cleaning <span class="text-theme">Service</span> Sets the Standard</h2>
<p class="sec-text text-white">Elevate your space with our thorough cleaning service, ensuring impeccable cleanliness and a welcoming atmosphere. Where we bring over dedicated hundred years of expertise to every job.</p>
</div>
<a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Get in Touch<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
<div class="col-xl-5">
<form action="javascript:void(0)" method="POST" class="contact-form1 ajax-contact">
<h3 class="form-title">Make Appoinment</h3>
<div class="input-wrap">
<div class="row">
<div class="form-group col-12">
<input type="text" class="form-control" name="name" id="name" placeholder="Your Name"> <i class="fal fa-user">
</i>
</div>
<div class="form-group col-12">
<input type="email" class="form-control" name="email" id="email" placeholder="Email Address"> <i class="fal fa-envelope">
</i>
</div>
<div class="form-group col-12">
<select name="subject" id="subject" class="form-select">
<option value="" disabled="disabled" selected="selected" hidden>Choose Service</option>
<option value="Home Cleaning">Home Cleaning</option>
<option value="Window Cleaning">Window Cleaning</option>
<option value="Bathroom Cleaning">Bathroom Cleaning</option>
<option value="Office Cleaning">Office Cleaning</option>
</select> <i class="fal fa-chevron-down">
</i>
</div>
<div class="form-group col-12">
<input type="text" class="form-control" name="location" id="location" placeholder="Location"> <i class="fal fa-location-dot">
</i>
</div>
<div class="form-btn col-12">
<button class="th-btn btn-fw">Submit<i class="fas fa-arrow-up-right ms-2">
</i>
</button>
</div>
</div>
<p class="form-messages mb-0 mt-3">
</p>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<section class="space">
<div class="shape-mockup jump d-none d-xl-block" data-top="0%" data-left="0%">
<img src="{{ asset('frontend/assets/img/shape/tool_shape_2.png') }}" alt="shape">
</div>
<div class="shape-mockup moving d-none d-xl-block" data-bottom="0%" data-right="0%">
<img src="{{ asset('frontend/assets/img/shape/tool_shape_3.png') }}" alt="shape">
</div>
<div class="container">
<div class="row justify-content-lg-between justify-content-center align-items-end">
<div class="col-lg-6">
<div class="title-area text-center text-lg-start">
<span class="sub-title2">
<img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Affordable Deal</span>
<h2 class="sec-title">Exclusive Pricing <span class="text-theme">Offer</span> with Transparent Costs</h2>
</div>
</div>
<div class="col-lg-auto mt-n3 mt-lg-0">
<div class="sec-btn">
<div class="nav price-tab" role="tablist">
<button class="th-btn" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="false">Monthly</button> <button class="th-btn active" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="true">Yearly</button>
</div>
</div>
</div>
</div>
<div class="tab-content">
<div class="tab-pane fade" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
<div class="price-card2-wrap">
<div class="price-card2 hover-item" data-bg-src="{{ asset('frontend/assets/img/bg/price_card_1.jpg') }}">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/price_card_1.svg') }}" alt="Icon">
</div>
<h3 class="box-title">Residential</h3>
<h4 class="box-price">
<span class="currency">$</span>160.99</h4>
<div class="box-content">
<div class="checklist">
<ul>
<li>
<i class="fas fa-check">
</i>Bedroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Bathroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Kitchen Cleaning</li>
<li class="unavailable">
<i class="fas fa-xmark">
</i>Floor Cleaning</li>
<li class="unavailable">
<i class="fas fa-xmark">
</i>Carpet Cleaning</li>
</ul>
</div>
<a href="#" class="th-btn btn-sm">Get Service<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
<div class="price-card2 hover-item item-active" data-bg-src="{{ asset('frontend/assets/img/bg/price_card_1.jpg') }}">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/price_card_2.svg') }}" alt="Icon">
</div>
<h3 class="box-title">Commercial</h3>
<h4 class="box-price">
<span class="currency">$</span>280.99</h4>
<div class="box-content">
<div class="checklist">
<ul>
<li>
<i class="fas fa-check">
</i>Bedroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Bathroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Kitchen Cleaning</li>
<li>
<i class="fas fa-check">
</i>Floor Cleaning</li>
<li class="unavailable">
<i class="fas fa-xmark">
</i>Carpet Cleaning</li>
</ul>
</div>
<a href="#" class="th-btn btn-sm">Get Service<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
<div class="price-card2 hover-item" data-bg-src="{{ asset('frontend/assets/img/bg/price_card_1.jpg') }}">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/price_card_3.svg') }}" alt="Icon">
</div>
<h3 class="box-title">Buildings</h3>
<h4 class="box-price">
<span class="currency">$</span>620.99</h4>
<div class="box-content">
<div class="checklist">
<ul>
<li>
<i class="fas fa-check">
</i>Bedroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Bathroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Kitchen Cleaning</li>
<li>
<i class="fas fa-check">
</i>Floor Cleaning</li>
<li>
<i class="fas fa-check">
</i>Carpet Cleaning</li>
</ul>
</div>
<a href="#" class="th-btn btn-sm">Get Service<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="tab-pane fade show active" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
<div class="price-card2-wrap">
<div class="price-card2 hover-item" data-bg-src="{{ asset('frontend/assets/img/bg/price_card_1.jpg') }}">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/price_card_1.svg') }}" alt="Icon">
</div>
<h3 class="box-title">Residential</h3>
<h4 class="box-price">
<span class="currency">$</span>650.99</h4>
<div class="box-content">
<div class="checklist">
<ul>
<li>
<i class="fas fa-check">
</i>Bedroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Bathroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Kitchen Cleaning</li>
<li class="unavailable">
<i class="fas fa-xmark">
</i>Floor Cleaning</li>
<li class="unavailable">
<i class="fas fa-xmark">
</i>Carpet Cleaning</li>
</ul>
</div>
<a href="#" class="th-btn btn-sm">Get Service<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
<div class="price-card2 hover-item item-active" data-bg-src="{{ asset('frontend/assets/img/bg/price_card_1.jpg') }}">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/price_card_2.svg') }}" alt="Icon">
</div>
<h3 class="box-title">Commercial</h3>
<h4 class="box-price">
<span class="currency">$</span>850.99</h4>
<div class="box-content">
<div class="checklist">
<ul>
<li>
<i class="fas fa-check">
</i>Bedroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Bathroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Kitchen Cleaning</li>
<li>
<i class="fas fa-check">
</i>Floor Cleaning</li>
<li class="unavailable">
<i class="fas fa-xmark">
</i>Carpet Cleaning</li>
</ul>
</div>
<a href="#" class="th-btn btn-sm">Get Service<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
<div class="price-card2 hover-item" data-bg-src="{{ asset('frontend/assets/img/bg/price_card_1.jpg') }}">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/price_card_3.svg') }}" alt="Icon">
</div>
<h3 class="box-title">Buildings</h3>
<h4 class="box-price">
<span class="currency">$</span>950.99</h4>
<div class="box-content">
<div class="checklist">
<ul>
<li>
<i class="fas fa-check">
</i>Bedroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Bathroom Cleaning</li>
<li>
<i class="fas fa-check">
</i>Kitchen Cleaning</li>
<li>
<i class="fas fa-check">
</i>Floor Cleaning</li>
<li>
<i class="fas fa-check">
</i>Carpet Cleaning</li>
</ul>
</div>
<a href="#" class="th-btn btn-sm">Get Service<i class="fas fa-arrow-up-right ms-2">
</i>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<div class="overflow-hidden space" data-bg-src="{{ asset('frontend/assets/img/bg/why_bg_1.jpg') }}">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-6 text-center text-xl-start">
<div class="title-area mb-32">
<span class="sub-title2">
<img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Why Choose us</span>
<h2 class="sec-title">Empowering Your <span class="text-theme">Business</span> with Our Expertise</h2>
<p class="sec-text">With a rich history of transforming businesses into success stories, our expertise is your competitive advantage. We excel in leveraging cutting-edge as strategies and industry insights to make your business shine, positioning you for sustained growth and prosperity in the market</p>
</div>
<div class="about-feature4-area">
<div class="about-feature2">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/about_feature_3.svg') }}" alt="icon">
</div>
<div class="media-body">
<h3 class="box-title">Expert Team</h3>
<p class="box-text">Our expert team drives success through knowledge, dedication.</p>
</div>
</div>
<div class="about-feature2">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/about_feature_4.svg') }}" alt="icon">
</div>
<div class="media-body">
<h3 class="box-title">Trancparent Price</h3>
<p class="box-text">Our expert team drives success through knowledge, dedication.</p>
</div>
</div>
<div class="about-feature2">
<div class="box-icon">
<img src="{{ asset('frontend/assets/img/icon/about_feature_5.svg') }}" alt="icon">
</div>
<div class="media-body">
<h3 class="box-title">Affordable Service</h3>
<p class="box-text">Our expert team drives success through knowledge, dedication.</p>
</div>
</div>
</div>
</div>
<div class="col-xl-6">
<div class="img-box4">
<div class="img1">
<img src="{{ asset('frontend/assets/img/normal/why_1_1.jpg') }}" alt="Why">
</div>
<div class="img2">
<img src="{{ asset('frontend/assets/img/normal/why_1_2.jpg') }}" alt="Why">
</div>
</div>
</div>
</div>
</div>
</div>
<section class="space-top" id="testi-sec">
<div class="container">
<div class="testi-box2-area">
<div class="row g-0 flex-row-reverse">
<div class="col-lg-5 order-2 order-lg-0">
<div class="testi-box2-img">
<img src="{{ asset('frontend/assets/img/testimonial/testi_2_1.jpg') }}" alt="Image">
</div>
</div>
<div class="col-lg-7">
<div class="testi-box2-slide">
<div class="title-area mb-40 text-center text-lg-start">
<span class="sub-title2">
<img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Testimonials</span>
<h2 class="sec-title">Client <span class="text-theme">Feedback</span> Data</h2>
</div>
<div class="swiper th-slider" id="testiSlide2" data-slider-options='{"effect":"slide","thumbs":{"swiper":".testi-box-thumb"}}'>
<div class="swiper-wrapper">
<div class="swiper-slide">
<div class="testi-box2">
<div class="box-review">
<i class="fa-sharp fa-solid fa-star">
</i>
<i class="fa-sharp fa-solid fa-star">
</i>
<i class="fa-sharp fa-solid fa-star">
</i>
<i class="fa-sharp fa-solid fa-star">
</i>
<i class="fa-sharp fa-solid fa-star">
</i>
</div>
<p class="box-text">The clean service I recently received was nothing to an hide for every short of exceptional. From the moment they arrived, their a professionalism was evident, and they carried out their tasks with a utmost precision. Every nook and cranny was thoroughly cleaned, leaving my are a space spotless and refreshed. I was thoroughly impressed with their attention to detail and commitment to ensuring a pristine environment.</p>
<div class="box-profile">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/testimonial/testi_3_1.jpg') }}" alt="image">
</div>
<div class="media-body">
<h3 class="box-title">David Thompson</h3>
<span class="box-desig">Director at Gram</span>
</div>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="testi-box2">
<div class="box-review">
<i class="fa-sharp fa-solid fa-star">
</i>
<i class="fa-sharp fa-solid fa-star">
</i>
<i class="fa-sharp fa-solid fa-star">
</i>
<i class="fa-sharp fa-solid fa-star">
</i>
<i class="fa-sharp fa-solid fa-star">
</i>
</div>
<p class="box-text">The clean service I recently received was nothing to an hide for every short of exceptional. From the moment they arrived, their a professionalism was evident, and they carried out their tasks with a utmost precision. Every nook and cranny was thoroughly cleaned, leaving my are a space spotless and refreshed. I was thoroughly impressed with their attention to detail and commitment to ensuring a pristine environment.</p>
<div class="box-profile">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/testimonial/testi_3_2.jpg') }}" alt="image">
</div>
<div class="media-body">
<h3 class="box-title">Alexan Micelito</h3>
<span class="box-desig">Manager at Motora</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="icon-box">
<button data-slider-prev="#testiSlide2" class="slider-arrow default">
<i class="far fa-arrow-left">
</i>
</button> <button data-slider-next="#testiSlide2" class="slider-arrow default">
<i class="far fa-arrow-right">
</i>
</button>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<div class="gallery-sec1" data-bg-src="{{ asset('frontend/assets/img/bg/gallery_bg_1.jpg') }}">
<div class="container space-top">
<div class="title-area text-center">
<span class="sub-title2">
<img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Our portfolio</span>
<h2 class="sec-title text-white">Display of Recent Projects</h2>
</div>
</div>
<div class="gallery-card3-wrap space-bottom">
<div class="gallery-card3 hover-item">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/gallery/gallery_1_1.jpg') }}" alt="gallery image">
</div>
<div class="box-content">
<div class="media-body">
<h3 class="box-title">
<a href="#">Official</a>
</h3>
<p class="box-text">Home Cleaning</p>
</div>
<a href="{{ asset('frontend/assets/img/gallery/gallery_1_1.jpg') }}" class="icon-btn popup-image">
<i class="far fa-plus">
</i>
</a>
</div>
</div>
<div class="gallery-card3 hover-item">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/gallery/gallery_1_2.jpg') }}" alt="gallery image">
</div>
<div class="box-content">
<div class="media-body">
<h3 class="box-title">
<a href="#">Industrial</a>
</h3>
<p class="box-text">Kitchen Cleaning</p>
</div>
<a href="{{ asset('frontend/assets/img/gallery/gallery_1_2.jpg') }}" class="icon-btn popup-image">
<i class="far fa-plus">
</i>
</a>
</div>
</div>
<div class="gallery-card3 hover-item item-active">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/gallery/gallery_1_3.jpg') }}" alt="gallery image">
</div>
<div class="box-content">
<div class="media-body">
<h3 class="box-title">
<a href="#">Residencial</a>
</h3>
<p class="box-text">Window Cleaning</p>
</div>
<a href="{{ asset('frontend/assets/img/gallery/gallery_1_3.jpg') }}" class="icon-btn popup-image">
<i class="far fa-plus">
</i>
</a>
</div>
</div>
<div class="gallery-card3 hover-item">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/gallery/gallery_1_4.jpg') }}" alt="gallery image">
</div>
<div class="box-content">
<div class="media-body">
<h3 class="box-title">
<a href="#">Corporate</a>
</h3>
<p class="box-text">Bathroom Cleaning</p>
</div>
<a href="{{ asset('frontend/assets/img/gallery/gallery_1_4.jpg') }}" class="icon-btn popup-image">
<i class="far fa-plus">
</i>
</a>
</div>
</div>
<div class="gallery-card3 hover-item">
<div class="box-img">
<img src="{{ asset('frontend/assets/img/gallery/gallery_1_5.jpg') }}" alt="gallery image">
</div>
<div class="box-content">
<div class="media-body">
<h3 class="box-title">
<a href="#">Business</a>
</h3>
<p class="box-text">Plumbing Service</p>
</div>
<a href="{{ asset('frontend/assets/img/gallery/gallery_1_5.jpg') }}" class="icon-btn popup-image">
<i class="far fa-plus">
</i>
</a>
</div>
</div>
</div>
</div>
<section class="space" id="blog-sec">
<div class="shape-mockup jump d-none d-xl-block" data-top="30%" data-left="0%">
<img src="{{ asset('frontend/assets/img/shape/tool_shape_4.png') }}" alt="shape">
</div>
<div class="container">
<div class="title-area text-center">
<span class="sub-title2">
<img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">News & Blog</span>
<h2 class="sec-title">Upadate News & Blog</h2>
</div>
<div class="slider-area">
<div class="swiper th-slider has-shadow" id="blogSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
<div class="swiper-wrapper">
<div class="swiper-slide">
<div class="blog-card2">
<div class="blog-img">
<img src="{{ asset('frontend/assets/img/blog/blog_2_1.jpg') }}" alt="blog image"> <span class="blog-date">
<span>20</span> <span>Jan</span>
</span>
</div>
<div class="blog-content">
<div class="blog-meta">
<a href="#">
<i class="fal fa-user">
</i>By Klano</a> <a href="#">
<i class="fal fa-comments">
</i>Comments (3)</a>
</div>
<h3 class="box-title">
<a href="#">Pure Serenity Unleash the fire of a Crystal Home</a>
</h3>
<a href="#" class="line-btn">Read More<i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="blog-card2">
<div class="blog-img">
<img src="{{ asset('frontend/assets/img/blog/blog_2_2.jpg') }}" alt="blog image"> <span class="blog-date">
<span>20</span> <span>Jan</span>
</span>
</div>
<div class="blog-content">
<div class="blog-meta">
<a href="#">
<i class="fal fa-user">
</i>By Klano</a> <a href="#">
<i class="fal fa-comments">
</i>Comments (3)</a>
</div>
<h3 class="box-title">
<a href="#">The Ultimate Floor Cleaner for a Gleaming Home</a>
</h3>
<a href="#" class="line-btn">Read More<i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="blog-card2">
<div class="blog-img">
<img src="{{ asset('frontend/assets/img/blog/blog_2_3.jpg') }}" alt="blog image"> <span class="blog-date">
<span>20</span> <span>Jan</span>
</span>
</div>
<div class="blog-content">
<div class="blog-meta">
<a href="#">
<i class="fal fa-user">
</i>By Klano</a> <a href="#">
<i class="fal fa-comments">
</i>Comments (3)</a>
</div>
<h3 class="box-title">
<a href="#">Mastering the Art of Effortless Bathroom Cleaning</a>
</h3>
<a href="#" class="line-btn">Read More<i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="blog-card2">
<div class="blog-img">
<img src="{{ asset('frontend/assets/img/blog/blog_2_4.jpg') }}" alt="blog image"> <span class="blog-date">
<span>20</span> <span>Jan</span>
</span>
</div>
<div class="blog-content">
<div class="blog-meta">
<a href="#">
<i class="fal fa-user">
</i>By Klano</a> <a href="#">
<i class="fal fa-comments">
</i>Comments (3)</a>
</div>
<h3 class="box-title">
<a href="#">The Best Secret Weapon for the Gleaming Kitchen</a>
</h3>
<a href="#" class="line-btn">Read More<i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="blog-card2">
<div class="blog-img">
<img src="{{ asset('frontend/assets/img/blog/blog_2_1.jpg') }}" alt="blog image"> <span class="blog-date">
<span>20</span> <span>Jan</span>
</span>
</div>
<div class="blog-content">
<div class="blog-meta">
<a href="#">
<i class="fal fa-user">
</i>By Klano</a> <a href="#">
<i class="fal fa-comments">
</i>Comments (3)</a>
</div>
<h3 class="box-title">
<a href="#">Beyond Clean Discover the Magic of Our Wizards</a>
</h3>
<a href="#" class="line-btn">Read More<i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="blog-card2">
<div class="blog-img">
<img src="{{ asset('frontend/assets/img/blog/blog_2_2.jpg') }}" alt="blog image"> <span class="blog-date">
<span>20</span> <span>Jan</span>
</span>
</div>
<div class="blog-content">
<div class="blog-meta">
<a href="#">
<i class="fal fa-user">
</i>By Klano</a> <a href="#">
<i class="fal fa-comments">
</i>Comments (3)</a>
</div>
<h3 class="box-title">
<a href="#">Crystal Clear Reinvent Your Space with Our Mastery</a>
</h3>
<a href="#" class="line-btn">Read More<i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
</div>
<button data-slider-prev="#blogSlider1" class="slider-arrow slider-prev">
<i class="far fa-arrow-left">
</i>
</button> <button data-slider-next="#blogSlider1" class="slider-arrow slider-next">
<i class="far fa-arrow-right">
</i>
</button>
</div>
</div>
</section>
<div class="space-bottom">
<div class="shape-mockup moving d-none d-xl-block" data-bottom="0%" data-right="0%">
<img src="{{ asset('frontend/assets/img/shape/tool_shape_5.png') }}" alt="shape">
</div>
<div class="container">
<div class="swiper th-slider" id="brandSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"420":{"slidesPerView":"3"},"768":{"slidesPerView":"4"},"992":{"slidesPerView":"5"},"1200":{"slidesPerView":"6"},"1400":{"slidesPerView":"6"}}}'>
<div class="swiper-wrapper">
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_1.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_2.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_3.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_4.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_5.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_6.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_1.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_2.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_3.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_4.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_5.svg') }}" alt="Brand Logo">
</div>
</div>
<div class="swiper-slide">
<div class="brand-card2">
<img src="{{ asset('frontend/assets/img/brand/brand_2_6.svg') }}" alt="Brand Logo">
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
