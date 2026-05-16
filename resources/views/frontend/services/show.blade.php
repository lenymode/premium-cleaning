@extends('frontend.layouts.app')

@section('content')
<section class="breadcumb-wrapper" data-bg-src="{{ asset('frontend/assets/img/hero/hero_bg_5_3.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $service->title }}</h1>
            <ul class="breadcumb-menu"><li><a href="{{ route('frontend.home') }}">Home</a></li><li><a href="{{ route('frontend.services.index') }}">Services</a></li><li>{{ $service->title }}</li></ul>
        </div>
    </div>
</section>

<section class="space">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8">
                <img class="rounded-3 mb-4" src="{{ asset('frontend/assets/img/'.$service->image) }}" alt="{{ $service->title }}">
                <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Crestwell Service</span>
                <h2 class="sec-title">{{ $service->title }} for Clean, Professional Spaces</h2>
                <p>{{ $service->description }}</p>
                <h3>Benefits</h3>
                <ul class="checklist">
                    @foreach($service->benefits as $benefit)
                        <li>{{ $benefit }}</li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    <a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Get Free Quote<i class="fas fa-arrow-up-right ms-2"></i></a>
                    <div class="mt-3">
                        @include('frontend.partials.contact-action-buttons')
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget_title">All Services</h3>
                        <ul>
                            @foreach($services as $item)
                                <li><a href="{{ route('frontend.services.show', $item->slug) }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="cw-quote-panel">
                        @include('frontend.partials.quote-form', ['selectedService' => $service->title])
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<section class="space bg-smoke">
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

<section class="testi-area2 space">
    <div class="container">
        <div class="title-area text-center"><span class="sub-title2">Testimonials</span><h2 class="sec-title">What Clients Say</h2></div>
        <div class="row gy-4">
            @foreach($testimonials as $testimonial)
                <div class="col-lg-4">
                    <div class="testi-grid2 h-100">
                        <div class="box-review">@for($i = 0; $i < $testimonial->rating; $i++)<i class="fa-sharp fa-solid fa-star"></i>@endfor</div>
                        <p class="box-text">{{ $testimonial->quote }}</p>
                        <h3 class="box-title">{{ $testimonial->name }}</h3>
                        <span class="box-desig">{{ $testimonial->role }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
