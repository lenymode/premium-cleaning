<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\PageDataService;
use App\Services\Frontend\ServicePageService;

class ContactController extends Controller
{
    public function __construct(
        private readonly ServicePageService $services,
        private readonly PageDataService $pageData,
    ) {
    }

    public function index()
    {
        return view('frontend.pages.contact', [
            'services' => $this->services->all(),
            'locations' => $this->pageData->locations(),
            'metaTitle' => 'Contact Crestwell Facilities | Get a Free Quote',
            'metaDescription' => 'Contact Crestwell Facilities for commercial cleaning, office cleaning, property cleaning and facilities support quotes.',
        ]);
    }
}
