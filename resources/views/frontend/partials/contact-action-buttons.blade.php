@php
    $whatsappUrl = 'https://wa.me/'.preg_replace('/\D+/', '', config('site.whatsapp'));
@endphp

<div class="cw-contact-actions">
    <a href="{{ $whatsappUrl }}" class="th-btn style6 cw-action-btn">
        WhatsApp Enquiry<i class="fab fa-whatsapp ms-2"></i>
    </a>
    <a href="tel:{{ config('site.phone_link') }}" class="th-btn cw-action-btn cw-call-action">
        Call {{ config('site.phone') }}<i class="fas fa-phone ms-2"></i>
    </a>
</div>
