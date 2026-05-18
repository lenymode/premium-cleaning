@extends('backend.layouts.app', ['title' => 'Company Information'])

@php
    $logoPath = fn (?string $path) => $path ? asset('frontend/assets/img/'.$path) : '';
@endphp

@section('content')
<form method="POST" action="{{ route('backend.settings.company-information.update') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PATCH')

    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Website identity</p>
                <h2 class="text-2xl font-black">Company information</h2>
                <p class="mt-1 text-sm text-slate-500">These values feed the frontend header, footer, SEO metadata and contact links.</p>
            </div>
            <button class="rounded-2xl bg-blue-600 px-5 py-3 text-sm font-black text-white shadow-lg shadow-blue-600/25 transition hover:bg-blue-700">Save Company Info</button>
        </div>

        <div class="grid gap-5 lg:grid-cols-2">
            <div>
                <label class="text-sm font-bold text-slate-700" for="name">Company name</label>
                <input id="name" name="name" value="{{ old('name', $settings['name'] ?? '') }}" required maxlength="255" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-400 @enderror">
                @error('name')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="tagline">Tagline</label>
                <input id="tagline" name="tagline" value="{{ old('tagline', $settings['tagline'] ?? '') }}" maxlength="255" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('tagline') border-red-400 @enderror">
                @error('tagline')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="phone">Phone</label>
                <input id="phone" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" maxlength="80" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('phone') border-red-400 @enderror">
                @error('phone')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="whatsapp">WhatsApp</label>
                <input id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $settings['whatsapp'] ?? '') }}" maxlength="80" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('whatsapp') border-red-400 @enderror">
                @error('whatsapp')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" maxlength="255" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('email') border-red-400 @enderror">
                @error('email')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="lead_recipient">Lead recipient email</label>
                <input id="lead_recipient" type="email" name="lead_recipient" value="{{ old('lead_recipient', $settings['lead_recipient'] ?? '') }}" maxlength="255" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('lead_recipient') border-red-400 @enderror">
                @error('lead_recipient')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="lg:col-span-2">
                <label class="text-sm font-bold text-slate-700" for="address">Address</label>
                <textarea id="address" name="address" rows="3" maxlength="500" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('address') border-red-400 @enderror">{{ old('address', $settings['address'] ?? '') }}</textarea>
                @error('address')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>
    </section>

    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Brand assets</p>
            <h2 class="text-2xl font-black">Logo settings</h2>
            <p class="mt-1 text-sm text-slate-500">Use the default logo on light areas and the white logo on dark header/footer areas.</p>
        </div>
        <div class="grid gap-5 lg:grid-cols-2">
        @foreach([
            ['key' => 'logo', 'input' => 'logo_file', 'title' => 'Default logo', 'tone' => 'bg-slate-50'],
            ['key' => 'logo_white', 'input' => 'logo_white_file', 'title' => 'White logo', 'tone' => 'bg-slate-950'],
        ] as $logo)
            <div class="rounded-3xl border border-slate-200 bg-slate-50/60 p-5" x-data="{ preview: '{{ $logoPath($settings[$logo['key']] ?? '') }}' }">
                <label class="text-sm font-black text-slate-800" for="{{ $logo['input'] }}">{{ $logo['title'] }}</label>
                <div class="{{ $logo['tone'] }} mt-3 grid aspect-square w-full place-items-center rounded-3xl border border-dashed border-slate-300 p-6">
                    <template x-if="preview">
                        <img :src="preview" alt="{{ $logo['title'] }} preview" class="max-h-32 max-w-[78%] object-contain sm:max-h-40">
                    </template>
                    <span x-show="!preview" class="text-sm font-bold text-slate-400">No logo selected</span>
                </div>
                <p class="mt-3 text-xs font-medium text-slate-500">JPG, PNG, WebP or SVG under 2MB.</p>
                <input id="{{ $logo['input'] }}" class="mt-3 block w-full rounded-2xl border border-slate-200 bg-white p-2 text-sm file:mr-4 file:rounded-xl file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-bold file:text-blue-700" type="file" name="{{ $logo['input'] }}" accept="image/png,image/jpeg,image/webp,image/svg+xml" @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : preview">
                @error($logo['input'])<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
        @endforeach
        </div>
    </section>

    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Social links</p>
            <h2 class="text-2xl font-black">Social and map settings</h2>
        </div>
        <div class="grid gap-5 lg:grid-cols-2">
            @foreach([
                'facebook_url' => ['label' => 'Facebook URL', 'icon' => 'fab fa-facebook-f'],
                'twitter_url' => ['label' => 'Twitter URL', 'icon' => 'fab fa-twitter'],
                'linkedin_url' => ['label' => 'LinkedIn URL', 'icon' => 'fab fa-linkedin-in'],
                'instagram_url' => ['label' => 'Instagram URL', 'icon' => 'fab fa-instagram'],
                'youtube_url' => ['label' => 'YouTube URL', 'icon' => 'fab fa-youtube'],
                'google_review_url' => ['label' => 'Google review URL', 'icon' => 'fab fa-google'],
                'google_maps_embed' => ['label' => 'Google Maps embed URL', 'icon' => 'fas fa-map-location-dot'],
            ] as $field => $meta)
                <div class="{{ $field === 'google_maps_embed' ? 'lg:col-span-2' : '' }}">
                    <label class="flex items-center gap-2 text-sm font-bold text-slate-700" for="{{ $field }}">
                        <span class="grid h-7 w-7 place-items-center rounded-xl bg-blue-50 text-blue-700"><i class="{{ $meta['icon'] }}"></i></span>
                        {{ $meta['label'] }}
                    </label>
                    <input id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $settings[$field] ?? '') }}" maxlength="1000" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error($field) border-red-400 @enderror">
                    @error($field)<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>
            @endforeach
        </div>
    </section>

    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Footer and tracking</p>
            <h2 class="text-2xl font-black">Extra company details</h2>
        </div>
        <div class="grid gap-5 lg:grid-cols-2">
            <div>
                <label class="text-sm font-bold text-slate-700" for="business_hours">Business hours</label>
                <textarea id="business_hours" name="business_hours" rows="3" maxlength="500" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('business_hours') border-red-400 @enderror">{{ old('business_hours', $settings['business_hours'] ?? '') }}</textarea>
                @error('business_hours')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="analytics_id">Google Analytics ID</label>
                <input id="analytics_id" name="analytics_id" value="{{ old('analytics_id', $settings['analytics_id'] ?? '') }}" maxlength="100" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('analytics_id') border-red-400 @enderror">
                @error('analytics_id')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="footer_about">Footer about text</label>
                <textarea id="footer_about" name="footer_about" rows="4" maxlength="1000" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('footer_about') border-red-400 @enderror">{{ old('footer_about', $settings['footer_about'] ?? '') }}</textarea>
                @error('footer_about')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="newsletter_text">Newsletter text</label>
                <textarea id="newsletter_text" name="newsletter_text" rows="4" maxlength="1000" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('newsletter_text') border-red-400 @enderror">{{ old('newsletter_text', $settings['newsletter_text'] ?? '') }}</textarea>
                @error('newsletter_text')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>
    </section>

    <div class="flex justify-end">
        <button class="rounded-2xl bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg shadow-blue-600/25 transition hover:bg-blue-700">Save Company Info</button>
    </div>
</form>
@endsection
