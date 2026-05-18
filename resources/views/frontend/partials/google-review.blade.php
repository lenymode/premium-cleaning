@php
    $googleReviewUrl = config('site.google_review_url');
    $hasGoogleReviewUrl = filled($googleReviewUrl) && $googleReviewUrl !== '#';
    $qrTarget = $hasGoogleReviewUrl ? $googleReviewUrl : url('/contact');
    $qrImage = 'https://api.qrserver.com/v1/create-qr-code/?size=220x220&margin=12&data='.rawurlencode($qrTarget);
@endphp

<section class="space cw-google-review-section">
    <div class="container">
        <div class="cw-google-review-card">
            <div class="cw-google-review-main">
                <div class="cw-google-badge" aria-hidden="true">
                    <span>G</span>
                </div>
                <div class="cw-google-review-copy">
                    <span class="cw-section-label">Google Reviews</span>
                    <h2>Public trust, visible on Google</h2>
                    <p>Use Crestwell's Google Business Profile to check public feedback, verify the business and leave a review after a completed service.</p>
                    <div class="cw-google-stars" aria-label="Google review stars">
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <span>Google Business Profile</span>
                    </div>
                    <div class="cw-google-actions">
                        @if($hasGoogleReviewUrl)
                            <a href="{{ $googleReviewUrl }}" target="_blank" rel="noopener" class="th-btn star-btn">Read Reviews<i class="fas fa-arrow-up-right ms-2"></i></a>
                            <a href="{{ $googleReviewUrl }}" target="_blank" rel="noopener" class="cw-google-text-link">Leave a Google review<i class="fab fa-google ms-2"></i></a>
                        @else
                            <a href="{{ route('frontend.contact') }}" class="th-btn star-btn">Request a Quote<i class="fas fa-arrow-up-right ms-2"></i></a>
                            <span class="cw-google-note">Google review link can be connected when the Business Profile is ready.</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="cw-google-qr">
                <span class="cw-qr-label">{{ $hasGoogleReviewUrl ? 'Scan to review' : 'Scan to enquire' }}</span>
                <img src="{{ $qrImage }}" alt="Google review QR code">
                <p>{{ $hasGoogleReviewUrl ? 'Opens Crestwell on Google' : 'Opens the contact page until Google reviews are connected' }}</p>
            </div>
        </div>
    </div>
</section>
