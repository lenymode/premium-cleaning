@extends('frontend.layouts.app')

@section('content')
<section class="breadcumb-wrapper" data-bg-src="{{ asset('frontend/assets/img/hero/hero_bg_5_3.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Cleaning & Facilities Services</h1>
            <ul class="breadcumb-menu"><li><a href="{{ route('frontend.home') }}">Home</a></li><li>Services</li></ul>
        </div>
    </div>
</section>

<section class="space cw-services-page">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title2"><img src="{{ asset('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Service Infrastructure</span>
            <h2 class="sec-title">Built for Commercial, Property and Residential Needs</h2>
        </div>
        <div class="row gy-4">
            @foreach($services as $service)
                <div class="col-md-6 col-xl-4">
                    <div class="service-card">
                        <div class="box-img"><img src="{{ asset('frontend/assets/img/'.$service->image) }}" alt="{{ $service->title }}"></div>
                        <div class="box-content">
                            <span class="cw-service-card-icon"><i class="{{ $service->iconClass }}"></i></span>
                            <h3 class="box-title"><a href="{{ route('frontend.services.show', $service->slug) }}">{{ $service->title }}</a></h3>
                            <div class="cw-service-card-footer">
                                <span>{{ $service->excerpt }}</span>
                                <a href="{{ route('frontend.services.show', $service->slug) }}" aria-label="Explore {{ $service->title }}"><i class="fas fa-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
