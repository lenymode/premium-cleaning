<?php

return [
    'name' => 'CRESTWELL FACILITIES',
    'tagline' => 'Clean Spaces. Strong Impressions.',
    'phone' => env('SITE_PHONE', '+44 0000 000000'),
    'phone_link' => env('SITE_PHONE_LINK', '+440000000000'),
    'email' => env('SITE_EMAIL', 'info@crestwellfacilities.com'),
    'whatsapp' => env('SITE_WHATSAPP', '+440000000000'),
    'address' => env('SITE_ADDRESS', 'United Kingdom'),
    'google_maps_embed' => env('SITE_GOOGLE_MAPS_EMBED', 'https://www.google.com/maps?q=United%20Kingdom&output=embed'),
    'google_review_url' => env('SITE_GOOGLE_REVIEW_URL', '#'),
    'analytics_id' => env('SITE_GOOGLE_ANALYTICS_ID'),
    'lead_recipient' => env('SITE_LEAD_RECIPIENT', env('SITE_EMAIL', 'info@crestwellfacilities.com')),
];
