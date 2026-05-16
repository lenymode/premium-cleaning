@if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<form class="cw-form" method="POST" action="{{ route('frontend.quote-requests.store') }}">
    @csrf
    <div class="row gy-3">
        <div class="col-md-6">
            <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Your name*" required>
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-6">
            <input class="form-control" name="company" value="{{ old('company') }}" placeholder="Company / property name">
        </div>
        <div class="col-md-6">
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email address*" required>
            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-6">
            <input class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone number*" required>
            @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-6">
            <select class="form-select" name="service" required>
                <option value="">Service required*</option>
                @foreach(app(\App\Services\Frontend\ServicePageService::class)->all() as $optionService)
                    <option value="{{ $optionService->title }}" @selected(old('service', $selectedService ?? '') === $optionService->title)>{{ $optionService->title }}</option>
                @endforeach
            </select>
            @error('service')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-6">
            <input class="form-control" name="property_type" value="{{ old('property_type') }}" placeholder="Property type">
        </div>
        <div class="col-12">
            <input class="form-control" name="postcode" value="{{ old('postcode') }}" placeholder="Postcode / service area">
        </div>
        <div class="col-12">
            <textarea class="form-control" name="message" rows="5" placeholder="Tell us about the site, schedule or cleaning requirement">{{ old('message') }}</textarea>
        </div>
        <div class="col-12">
            <button class="th-btn star-btn w-100" type="submit">Get Free Quote<i class="fas fa-arrow-up-right ms-2"></i></button>
        </div>
    </div>
</form>
