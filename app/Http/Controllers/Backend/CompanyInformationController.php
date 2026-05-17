<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Backend\ImageUploadService;
use App\Services\SiteSettingsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyInformationController extends Controller
{
    public function edit(SiteSettingsService $settings): View
    {
        return view('backend.settings.company-information', [
            'settings' => $settings->values(),
        ]);
    }

    public function update(Request $request, ImageUploadService $images, SiteSettingsService $settings): RedirectResponse
    {
        if (! $settings->tableExists()) {
            return back()
                ->withErrors(['settings' => 'Please run database/raw_sql/site_settings.sql before saving company information.'])
                ->withInput();
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:80'],
            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:80'],
            'address' => ['nullable', 'string', 'max:500'],
            'business_hours' => ['nullable', 'string', 'max:500'],
            'footer_about' => ['nullable', 'string', 'max:1000'],
            'newsletter_text' => ['nullable', 'string', 'max:1000'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'youtube_url' => ['nullable', 'url', 'max:255'],
            'google_maps_embed' => ['nullable', 'url', 'max:1000'],
            'google_review_url' => ['nullable', 'url', 'max:1000'],
            'lead_recipient' => ['nullable', 'email', 'max:255'],
            'analytics_id' => ['nullable', 'string', 'max:100'],
            'logo_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'logo_white_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'remove_logo' => ['nullable', 'boolean'],
            'remove_logo_white' => ['nullable', 'boolean'],
        ]);

        $current = $settings->values();
        $data = collect($validated)
            ->except([
                'logo_file',
                'logo_white_file',
                'remove_logo',
                'remove_logo_white',
            ])
            ->all();

        $data['phone_link'] = $settings->phoneLink($data['phone'] ?? null);

        foreach ([
            'logo_file' => ['key' => 'logo', 'remove' => 'remove_logo', 'default' => 'logo.svg'],
            'logo_white_file' => ['key' => 'logo_white', 'remove' => 'remove_logo_white', 'default' => 'logo-white.svg'],
        ] as $input => $logo) {
            if ($request->hasFile($input)) {
                $images->deleteFrontendImage($current[$logo['key']] ?? null);
                $data[$logo['key']] = $images->storeFrontendImage($request->file($input), 'company');
            } elseif ($request->boolean($logo['remove'])) {
                $images->deleteFrontendImage($current[$logo['key']] ?? null);
                $data[$logo['key']] = $logo['default'];
            }
        }

        $settings->update($data);

        return back()->with('status', 'Company information updated.');
    }
}
