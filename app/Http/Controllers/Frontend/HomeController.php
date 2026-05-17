<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\PageDataService;
use App\Services\Frontend\ServicePageService;

class HomeController extends Controller
{
    public function __construct(
        private readonly ServicePageService $services,
        private readonly PageDataService $pageData,
    ) {
    }

    public function index()
    {
        return view('frontend.pages.home', [
            'services' => $this->services->featured(9),
            'quoteServices' => $this->services->all(),
            'testimonials' => $this->pageData->testimonials(),
            'locations' => $this->pageData->locations(),
            'processSteps' => $this->pageData->processSteps(),
            'trustPoints' => $this->pageData->trustPoints(),
            'metaTitle' => 'Crestwell Facilities | Commercial Cleaning & Facilities Support',
            'metaDescription' => 'Premium commercial cleaning, office cleaning and facilities support from Crestwell Facilities. Clean Spaces. Strong Impressions.',
        ]);
    }

    public function robots()
    {
        return response("User-agent: *\nAllow: /\nSitemap: ".route('frontend.sitemap')."\n", 200, ['Content-Type' => 'text/plain']);
    }

    public function sitemap()
    {
        $urls = [
            route('frontend.home'),
            route('frontend.about'),
            route('frontend.services.index'),
            route('frontend.contact'),
            ...array_map(fn ($service) => route('frontend.services.show', $service->slug), $this->services->all()),
        ];

        return response()
            ->view('frontend.pages.sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }
}
