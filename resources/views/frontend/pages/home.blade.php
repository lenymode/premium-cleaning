@extends('frontend.layouts.app')

@section('content')
<section class="th-hero-wrapper hero-5" id="hero">
    <div class="shape-mockup starani" data-top="9%" data-left="9%"><img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape"></div>
    <div class="swiper th-slider" id="heroSlide5" data-slider-options='{"effect":"fade"}'>
        <div class="swiper-wrapper">
            @foreach([
                ['image' => 'hero/hero_bg_5_1.jpg', 'title' => 'Commercial Cleaning Built for Strong Impressions', 'text' => 'Premium cleaning and facilities support for offices, commercial spaces, managed properties and high-standard residential environments.'],
                // ['image' => 'hero/hero_bg_5_1.jpg', 'title' => 'Clean Spaces. Strong Impressions.', 'text' => 'A scalable service partner for businesses, landlords, agents and property operators who need reliable cleaning delivery.'],
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
                                    <a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Get Quote<i class="fas fa-arrow-up-right ms-2"></i></a>
                                    <a href="tel:{{ config('site.phone_link') }}" class="th-btn style6 cw-hero-call-btn">Call Now<i class="fas fa-phone ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="space overflow-hidden" id="about-sec">
    <div class="shape-mockup jump" data-top="15%" data-left="0%"><img src="{{ asset('frontend/assets/img/shape/vector_shape_6.png') }}" alt="shape"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 mb-30 mb-xl-0">
                <div class="pe-xxl-5">
                    <div class="img-box5">
                        <div class="img1"><img src="{{ asset('frontend/assets/img/normal/about_2_1.jpg') }}" alt="Image"></div>
                        <div class="year-box">
                            <div class="box-number"><span class="counter-number">35</span></div>
                            <h4 class="box-title">Years<br>Experience</h4>
                        </div>
                        <div class="img2"><img src="{{ asset('frontend/assets/img/normal/about_2_2.jpg') }}" alt="Image"></div>
                        <div class="shape1"><img src="{{ asset('frontend/assets/img/normal/dots.png') }}" alt="Dots"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 text-xl-start text-center">
                <div class="title-area mb-32">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">About company</span>
                    <h2 class="sec-title">Our Promise is To Deliver Only The Best <span class="text-theme">Services</span></h2>
                    <p class="sec-text">For over a decade, our cleaning service company is a beacon of cleanliness and professionalism. We take pride in providing top-tier cleaning solutions to businesses, ensuring their spaces are pristine, healthy, and inviting for employees.</p>
                </div>
                <div class="checklist style3 list-two-column mb-30">
                    <ul>
                        <li><i class="fas fa-shield-check"></i> 100% Satisfaction Guaranteed</li>
                        <li><i class="fas fa-shield-check"></i> Qualityful Instrument</li>
                        <li><i class="fas fa-shield-check"></i> Expert Cleaning Team</li>
                        <li><i class="fas fa-shield-check"></i> 24/7 Online Support</li>
                    </ul>
                </div>
                <a href="{{ route('frontend.about') }}" class="th-btn star-btn">Discover More<i class="fas fa-arrow-up-right ms-2"></i></a>
            </div>
        </div>
    </div>
</div>

<section class="space-bottom" id="service-sec">
    <div class="shape-mockup jump" data-bottom="10%" data-right="0%"><img src="{{ asset('frontend/assets/img/shape/vector_shape_7.png') }}" alt="shape"></div>
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-end">
            <div class="col-lg">
                <div class="title-area text-center text-lg-start">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Our Services</span>
                    <h2 class="sec-title">Professional Cleaning Services</h2>
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
                            <div class="box-shape"></div>
                            <div class="box-shape"></div>
                            <div class="box-shape"></div>
                            <div class="box-img"><img src="{{ asset('frontend/assets/img/'.$service->image) }}" alt="{{ $service->title }}"></div>
                            <h3 class="box-title"><a href="{{ route('frontend.services.show', $service->slug) }}">{{ $service->title }}</a></h3>
                            <p class="box-text">{{ $service->excerpt }}</p>
                            <a href="{{ route('frontend.services.show', $service->slug) }}" class="th-btn star-btn2 style2">See More<i class="fas fa-arrow-up-right ms-2"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="z-index-common" data-bg-src="{{ asset('frontend/assets/img/bg/counter_bg_1.jpg') }}">
    <div class="container">
        <div class="counter-card2-wrap">
            @foreach([
                ['icon' => 'counter_card_1.svg', 'number' => '55', 'unit' => 'k', 'label' => 'Project Completed'],
                ['icon' => 'counter_card_2.svg', 'number' => '1.9', 'unit' => 'k', 'label' => 'Expert Cleaner'],
                ['icon' => 'counter_card_3.svg', 'number' => '45', 'unit' => 'k', 'label' => 'Satisfied Customer'],
                ['icon' => 'counter_card_4.svg', 'number' => '900', 'unit' => '', 'label' => 'Worldwide Awards'],
            ] as $counter)
                <div class="counter-card2">
                    <div class="box-icon"><img src="{{ asset('frontend/assets/img/icon/'.$counter['icon']) }}" alt="Icon"></div>
                    <h2 class="box-number"><span class="number"><span class="counter-number">{{ $counter['number'] }}</span>{{ $counter['unit'] }}</span><span class="plus">+</span></h2>
                    <p class="box-text">{{ $counter['label'] }}</p>
                </div>
                <div class="divider"></div>
            @endforeach
        </div>
    </div>
</div>

<section class="overflow-hidden space">
    <div class="shape-mockup spin d-none d-lg-block" data-top="11%" data-left="-200px"><img src="{{ asset('frontend/assets/img/shape/vector_shape_8.png') }}" alt="shape"></div>
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Work Process</span>
            <h2 class="sec-title">How We Works</h2>
        </div>
        <div class="process-card2-wrap">
            @foreach([
                ['image' => 'process_card_1.jpg', 'title' => 'Book Online', 'text' => 'Online booking system streamlines appointment scheduling'],
                ['image' => 'process_card_2.jpg', 'title' => 'Get Expert Team', 'text' => 'Online booking system streamlines appointment scheduling'],
                ['image' => 'process_card_3.jpg', 'title' => 'Enjoy cleaning', 'text' => 'Online booking system streamlines appointment scheduling'],
            ] as $step)
                <div class="process-card2">
                    <div class="box-img"><img src="{{ asset('frontend/assets/img/normal/'.$step['image']) }}" alt="icon"></div>
                    <h3 class="box-title">{{ $step['title'] }}</h3>
                    <p class="box-text">{{ $step['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="space" data-bg-src="{{ asset('frontend/assets/img/bg/cta_bg_1.jpg') }}">
    <div class="shape-mockup starani" data-top="5%" data-left="40%"><img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape"></div>
    <div class="shape-mockup starani" data-bottom="22%" data-left="12%"><img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape"></div>
    <div class="shape-mockup starani" data-top="45%" data-right="6%"><img src="{{ asset('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape"></div>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-7 col-md-9">
                <div class="title-area text-center mb-35">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Any Help?</span>
                    <h2 class="sec-title text-white">Seeking Home or Business Cleaning Services?</h2>
                </div>
                <h3 class="call-1 mb-n2"><a href="tel:{{ config('site.phone_link') }}"><i class="fa-solid fa-headset"></i> {{ config('site.phone') }}</a></h3>
            </div>
        </div>
    </div>
</section>

<section class="bg-top-center overflow-hidden space-top" id="team-sec">
    <div class="container z-index-common">
        <div class="row justify-content-lg-between justify-content-center align-items-end">
            <div class="col-lg">
                <div class="title-area text-center text-lg-start">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Our Team</span>
                    <h2 class="sec-title">Cleaning Expert Team</h2>
                </div>
            </div>
            <div class="col-lg-auto mt-n3 mt-lg-0">
                <div class="sec-btn"><a href="{{ route('frontend.contact') }}" class="th-btn">All Members<i class="fas fa-arrow-up-right ms-2"></i></a></div>
            </div>
        </div>
        <div class="swiper th-slider has-shadow" id="teamSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
            <div class="swiper-wrapper">
                @foreach([
                    ['image' => 'team_2_1.jpg', 'name' => 'Nova Midnight'],
                    ['image' => 'team_2_2.jpg', 'name' => 'Jospher Fros'],
                    ['image' => 'team_2_3.jpg', 'name' => 'Isabella Ember'],
                    ['image' => 'team_2_4.jpg', 'name' => 'Gabriel Turner'],
                    ['image' => 'team_2_5.jpg', 'name' => 'Benjamin Davis'],
                    ['image' => 'team_2_6.jpg', 'name' => 'Ava Dankin'],
                ] as $member)
                    <div class="swiper-slide">
                        <div class="th-team team-card2">
                            <div class="box-img"><img src="{{ asset('frontend/assets/img/team/'.$member['image']) }}" alt="Team"></div>
                            <div class="box-content">
                                <div class="media-body">
                                    <h3 class="box-title"><a href="{{ route('frontend.contact') }}">{{ $member['name'] }}</a></h3>
                                    <span class="box-desig">Clean Expert</span>
                                </div>
                                <div class="team-social">
                                    <button class="icon-btn"><i class="far fa-plus"></i></button>
                                    <div class="th-social">
                                        <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="overflow-hidden space-top space-extra-bottom">
    <div class="shape-mockup moving d-none d-xxl-block" data-bottom="0%" data-left="0%"><img src="{{ asset('frontend/assets/img/shape/tool_shape_6.png') }}" alt="shape"></div>
    <div class="shape-mockup spin" data-top="0%" data-right="-130px"><img src="{{ asset('frontend/assets/img/shape/vector_shape_9.png') }}" alt="shape"></div>
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Our portfolio</span>
            <h2 class="sec-title">Display of Recent Projects</h2>
        </div>
        <div class="row gallery-row filter-active justify-content-center">
            @foreach([
                ['image' => 'gallery_2_1.jpg', 'title' => 'Official Clean', 'text' => 'floor Cleaning'],
                ['image' => 'gallery_2_2.jpg', 'title' => 'Industrial', 'text' => 'Mat Cleaning'],
                ['image' => 'gallery_2_3.jpg', 'title' => 'Residencial Area', 'text' => 'Window Cleaning'],
                ['image' => 'gallery_2_4.jpg', 'title' => 'Corporate Clean', 'text' => 'All Cleaing'],
                ['image' => 'gallery_2_5.jpg', 'title' => 'Business Group', 'text' => 'Clean Service'],
            ] as $project)
                <div class="col-lg-4 col-xl-4 col-xxl-auto filter-item">
                    <div class="gallery-box">
                        <div class="box-img"><img src="{{ asset('frontend/assets/img/gallery/'.$project['image']) }}" alt="gallery image"></div>
                        <div class="box-content">
                            <div class="media-body">
                                <h3 class="box-title"><a href="{{ route('frontend.services.index') }}">{{ $project['title'] }}</a></h3>
                                <p class="box-text">{{ $project['text'] }}</p>
                            </div>
                            <a href="{{ asset('frontend/assets/img/gallery/'.$project['image']) }}" class="icon-btn popup-image"><i class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<section class="testi-area2 space" id="testi-sec">
    <div class="shape-mockup" data-top="0%" data-right="0%"><img src="{{ asset('frontend/assets/img/shape/vector_shape_10.png') }}" alt="shape"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="title-area text-center">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Testimonials</span>
                    <h2 class="sec-title">A Customer's Remarkable Experience</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="testi-grid2-img">
                    <div class="swiper th-slider testi-grid2-thumb" id="testiSlideImg" data-slider-options='{"effect":"fade","spaceBetween":0}'>
                        <div class="swiper-wrapper">
                            @foreach(['testi_5_1.jpg', 'testi_5_2.jpg', 'testi_5_3.jpg'] as $image)
                                <div class="swiper-slide"><img src="{{ asset('frontend/assets/img/testimonial/'.$image) }}" alt="Image"></div>
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

<section class="overflow-hidden space" id="blog-sec">
    <div class="shape-mockup jump-reverse" data-top="10%" data-right="0%"><img src="{{ asset('frontend/assets/img/shape/vector_shape_1.png') }}" alt="shape"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-5 col-lg-6 col-md-8">
                <div class="title-area text-center">
                    <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">News & Blogs Update</span>
                    <h2 class="sec-title">Insights and Tips from Klano Clean</h2>
                </div>
            </div>
        </div>
        <div class="row gy-4">
            @foreach([
                ['image' => 'blog_5_1.jpg', 'title' => 'Pure Serenity Unleash the fire of a Crystal Home', 'category' => 'Residencial'],
                ['image' => 'blog_5_2.jpg', 'title' => 'The Ultimate Floor Cleaner for a Gleaming Home', 'category' => 'Commercial'],
                ['image' => 'blog_5_3.jpg', 'title' => 'Mastering the Art of Effortless Bathroom Cleaning', 'category' => 'Event Cleaning'],
            ] as $blog)
                <div class="col-xl-4 col-md-6">
                    <div class="blog-box2">
                        <div class="blog-img"><img src="{{ asset('frontend/assets/img/blog/'.$blog['image']) }}" alt="blog image"></div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('frontend.home') }}"><i class="fas fa-user"></i>By Kleanix</a>
                                <a href="{{ route('frontend.home') }}"><i class="fas fa-comments"></i>Comments (3)</a>
                            </div>
                            <h3 class="box-title"><a href="{{ route('frontend.services.index') }}">{{ $blog['title'] }}</a></h3>
                            <div class="box-bottom">
                                <a href="{{ route('frontend.services.index') }}" class="category">{{ $blog['category'] }}</a>
                                <a href="{{ route('frontend.services.index') }}" class="box-btn"><i class="fas fa-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="bg-theme" data-bg-src="{{ asset('frontend/assets/img/bg/subscribe_bg_1.png') }}">
    <div class="container z-index-common">
        <div class="newsletter-wrap">
            <div class="newsletter-content">
                <h2 class="sec-title mb-0 text-white">Subscribe For Newsletter</h2>
                <p class="box-text text-white">Sign Up to get updates & news about us</p>
            </div>
            <form class="newsletter-form">
                <div class="form-group">
                    <input class="form-control mb-0" type="email" placeholder="Email Address" required>
                </div>
                <button type="submit" class="th-btn style6">Subscribe<i class="fal fa-paper-plane ms-2"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection
