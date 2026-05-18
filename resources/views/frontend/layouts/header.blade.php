@php
    $navigationServices = app(\App\Services\Frontend\ServicePageService::class)->all();
    $navigationServiceIcons = [
        'fa-solid fa-building',
        'fa-solid fa-briefcase',
        'fa-solid fa-key',
        'fa-solid fa-bed',
        'fa-solid fa-sparkles',
        'fa-solid fa-screwdriver-wrench',
        'fa-solid fa-droplet',
        'fa-solid fa-triangle-exclamation',
        'fa-solid fa-house-chimney',
    ];
@endphp
<div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls">
            <i class="far fa-times">
            </i>
        </button>
        <div class="widget woocommerce widget_shopping_cart">
            <h3 class="widget_title">Shopping cart</h3>
            <div class="widget_shopping_cart_content">
                <ul class="woocommerce-mini-cart cart_list product_list_widget">
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button">
                            <i class="far fa-times">
                            </i>
                        </a> <a href="#">
                            <img src="{{ asset('frontend/assets/img/product/product_thumb_1_1.jpg') }}"
                                alt="Cart Image">Bacteria Spray Cleaner</a> <span class="quantity">1 × <span
                                class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>940.00</span>
                        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button">
                            <i class="far fa-times">
                            </i>
                        </a> <a href="#">
                            <img src="{{ asset('frontend/assets/img/product/product_thumb_1_2.jpg') }}"
                                alt="Cart Image">Antibacterial Liquid</a> <span class="quantity">1 × <span
                                class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>899.00</span>
                        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button">
                            <i class="far fa-times">
                            </i>
                        </a> <a href="#">
                            <img src="{{ asset('frontend/assets/img/product/product_thumb_1_3.jpg') }}"
                                alt="Cart Image">Scouring Pads Spong</a> <span class="quantity">1 × <span
                                class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>756.00</span>
                        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button">
                            <i class="far fa-times">
                            </i>
                        </a> <a href="#">
                            <img src="{{ asset('frontend/assets/img/product/product_thumb_1_4.jpg') }}"
                                alt="Cart Image">Floor Polish Mechine</a> <span class="quantity">1 × <span
                                class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>723.00</span>
                        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button">
                            <i class="far fa-times">
                            </i>
                        </a> <a href="#">
                            <img src="{{ asset('frontend/assets/img/product/product_thumb_1_5.jpg') }}"
                                alt="Cart Image">Magic Detargent</a> <span class="quantity">1 × <span
                                class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>1080.00</span>
                        </span>
                    </li>
                </ul>
                <p class="woocommerce-mini-cart__total total">
                    <strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">$</span>4398.00</span>
                </p>
                <p class="woocommerce-mini-cart__buttons buttons">
                    <a href="#" class="th-btn star-btn wc-forward">View cart</a> <a href="#"
                        class="th-btn star-btn checkout wc-forward">Checkout</a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose">
        <i class="fal fa-times">
        </i>
    </button>
    <form action="javascript:void(0)">
        <input type="text" placeholder="What are you looking for?"> <button type="submit">
            <i class="fal fa-search">
            </i>
        </button>
    </form>
</div>
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle">
            <i class="fal fa-times">
            </i>
        </button>
        <div class="mobile-logo">
            <a href="{{ route('frontend.home') }}">
                <img src="{{ asset('frontend/assets/img/' . config('site.logo')) }}" alt="{{ config('site.name') }}">
            </a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li>
                    <a href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('frontend.about') }}">About Us</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Service</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('frontend.services.index') }}">All Services</a>
                        </li>
                        @foreach ($navigationServices as $service)
                            <li>
                                <a
                                    href="{{ route('frontend.services.show', $service->slug) }}">{{ $service->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                {{-- <li class="menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li class="menu-item-has-children">
                            <a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Shop</a>
                                </li>
                                <li>
                                    <a href="#">Shop Details</a>
                                </li>
                                <li>
                                    <a href="#">Cart Page</a>
                                </li>
                                <li>
                                    <a href="#">Checkout</a>
                                </li>
                                <li>
                                    <a href="#">Wishlist</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Team</a>
                        </li>
                        <li>
                            <a href="#">Team Details</a>
                        </li>
                        <li>
                            <a href="#">Project Gallery</a>
                        </li>
                        <li>
                            <a href="#">Project Details</a>
                        </li>
                        <li>
                            <a href="#">Pricing Plan</a>
                        </li>
                        <li>
                            <a href="#">Testimonials</a>
                        </li>
                        <li>
                            <a href="#">Appointment</a>
                        </li>
                        <li>
                            <a href="#">Faq Page</a>
                        </li>
                        <li>
                            <a href="#">Error Page</a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">Blog</a>
                        </li>
                        <li>
                            <a href="#">Blog Details</a>
                        </li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{ route('frontend.contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<header class="th-header header-layout3">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li class="d-none d-sm-inline-block">
                                <i class="fas fa-phone">
                                </i>
                                <b>Phone:</b>
                                <a href="tel:{{ config('site.phone_link') }}">{{ config('site.phone') }}</a>
                            </li>
                            <li class="d-none d-sm-inline-block">
                                <i class="fas fa-envelope">
                                </i>
                                <b>Email:</b>
                                <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-links">
                        <ul>
                            <li class="d-none d-md-inline-block">
                                <div class="dropdown-link">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                                        data-bs-toggle="dropdown" aria-expanded="true">
                                        <img src="{{ asset('frontend/assets/img/icon/english.png') }}"
                                            alt="icon"> English</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li>
                                            <a href="#">German</a> <a href="#">French</a> <a
                                                href="#">Italian</a> <a href="#">Latvian</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="social-links">
                                    <a href="{{ config('site.facebook_url') }}">
                                        <i class="fab fa-facebook-f">
                                        </i>
                                    </a> <a href="{{ config('site.twitter_url') }}">
                                        <i class="fab fa-twitter">
                                        </i>
                                    </a> <a href="{{ config('site.linkedin_url') }}">
                                        <i class="fab fa-linkedin-in">
                                        </i>
                                    </a> <a href="{{ config('site.instagram_url') }}">
                                        <i class="fab fa-instagram">
                                        </i>
                                    </a> <a href="{{ config('site.youtube_url') }}">
                                        <i class="fab fa-youtube">
                                        </i>
                                    </a>
                                </div>
                            </li>
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
                        <div class="header-logo">
                            <a href="{{ route('frontend.home') }}">
                                <img src="{{ asset('frontend/assets/img/' . config('site.logo')) }}"
                                    alt="{{ config('site.name') }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto d-none d-lg-inline-block">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li>
                                    <a href="{{ route('frontend.home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.about') }}">About Us</a>
                                </li>
                                <li class="menu-item-has-children cw-services-nav-item">
                                    <a href="#">Services</a>
                                    <ul class="sub-menu cw-service-mega-menu">
                                        @foreach ($navigationServices as $service)
                                            <li>
                                                <a href="{{ route('frontend.services.show', $service->slug) }}"
                                                    class="cw-mega-link">
                                                    <span class="cw-mega-icon" aria-hidden="true">
                                                        <i
                                                            class="{{ $navigationServiceIcons[$loop->index % count($navigationServiceIcons)] }}"></i>
                                                    </span>
                                                    <span>
                                                        <span class="cw-mega-title">{{ $service->title }}</span>
                                                        <span
                                                            class="cw-mega-text">{{ $service->excerpt ?: 'Professional cleaning support for your space' }}</span>
                                                    </span>
                                                    <span class="cw-mega-arrow" aria-hidden="true">
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                        <li class="cw-mega-all-services">
                                            <a href="{{ route('frontend.services.index') }}" class="cw-mega-view-all">
                                                <span>View all services</span>
                                                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- <li class="menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop</a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="#">Shop</a>
                                                </li>
                                                <li>
                                                    <a href="#">Shop Details</a>
                                                </li>
                                                <li>
                                                    <a href="#">Cart Page</a>
                                                </li>
                                                <li>
                                                    <a href="#">Checkout</a>
                                                </li>
                                                <li>
                                                    <a href="#">Wishlist</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Team</a>
                                        </li>
                                        <li>
                                            <a href="#">Team Details</a>
                                        </li>
                                        <li>
                                            <a href="#">Project Gallery</a>
                                        </li>
                                        <li>
                                            <a href="#">Project Details</a>
                                        </li>
                                        <li>
                                            <a href="#">Pricing Plan</a>
                                        </li>
                                        <li>
                                            <a href="#">Testimonials</a>
                                        </li>
                                        <li>
                                            <a href="#">Appointment</a>
                                        </li>
                                        <li>
                                            <a href="#">Faq Page</a>
                                        </li>
                                        <li>
                                            <a href="#">Error Page</a>
                                        </li>
                                    </ul>
                                </li> --}}
                                {{-- <li class="menu-item-has-children">
                                    <a href="#">Blog</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="#">Blog</a>
                                        </li>
                                        <li>
                                            <a href="#">Blog Details</a>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li>
                                    <a href="{{ route('frontend.contact') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto">
                        <div class="header-button">
                            <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('site.whatsapp')) }}"
                                class="cw-navbar-whatsapp">WhatsApp Inquiry<i class="fab fa-whatsapp">
                                </i>
                            </a>
                            <a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Get Free Quote<i
                                    class="fas fa-arrow-up-right ms-2">
                                </i>
                            </a> <button type="button" class="th-menu-toggle d-block d-lg-none">
                                <i class="far fa-bars">
                                </i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
