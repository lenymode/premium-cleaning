<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('frontend.pages.about', [
            'metaTitle' => 'About Crestwell Facilities',
            'metaDescription' => 'Learn about Crestwell Facilities, a professional cleaning and facilities support brand built around reliability, consistency and scalable delivery.',
        ]);
    }
}
