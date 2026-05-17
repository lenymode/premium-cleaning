<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $metaTitle ?? config('site.name') }}</title>
    <meta name="description" content="{{ $metaDescription ?? config('site.tagline') }}">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:title" content="{{ $metaTitle ?? config('site.name') }}">
    <meta property="og:description" content="{{ $metaDescription ?? config('site.tagline') }}">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/png" href="{{ asset('frontend/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/logo-fixes.css') }}">
    @unless(request()->routeIs('frontend.home'))
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/crestwell.css') }}">
    @endunless
    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@type": "CleaningService",
            "name": "{{ config('site.name') }}",
            "description": "{{ config('site.tagline') }}",
            "telephone": "{{ config('site.phone') }}",
            "email": "{{ config('site.email') }}",
            "address": "{{ config('site.address') }}",
            "url": "{{ url('/') }}",
            "areaServed": "Local commercial, property and residential service areas",
            "serviceType": ["Commercial Cleaning", "Office Cleaning", "Facilities Support", "Property Cleaning Services"]
        }
    </script>
    @if(config('site.analytics_id'))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('site.analytics_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config('site.analytics_id') }}');
        </script>
    @endif
</head>
<body>
    <div class="preloader">
        <button class="th-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner"><div class="loader"></div></div>
    </div>

    @include('frontend.layouts.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.layouts.footer')
    @include('frontend.layouts.scripts')
</body>
</html>
