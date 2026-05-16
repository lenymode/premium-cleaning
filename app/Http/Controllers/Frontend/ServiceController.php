<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\PageDataService;
use App\Services\Frontend\ServicePageService;

class ServiceController extends Controller
{
    public function __construct(
        private readonly ServicePageService $services,
        private readonly PageDataService $pageData,
    ) {
    }

    public function index()
    {
        return view('frontend.pages.services', [
            'services' => $this->services->all(),
            'metaTitle' => 'Cleaning & Facilities Services | Crestwell Facilities',
            'metaDescription' => 'Explore commercial cleaning, office cleaning, end of tenancy cleaning, Airbnb cleaning, facilities support and property cleaning services.',
        ]);
    }

    public function show(string $slug)
    {
        $service = $this->services->findBySlug($slug);

        return view('frontend.services.show', [
            'service' => $service,
            'services' => $this->services->all(),
            'testimonials' => $this->pageData->testimonials(),
            'metaTitle' => $service->metaTitle,
            'metaDescription' => $service->metaDescription,
        ]);
    }
}
