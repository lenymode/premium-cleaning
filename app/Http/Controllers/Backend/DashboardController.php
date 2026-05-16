<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\QuoteRequest;
use App\Models\Service;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('backend.dashboard', [
            'serviceCount' => $this->countSafely(Service::class),
            'testimonialCount' => $this->countSafely(Testimonial::class),
            'locationCount' => $this->countSafely(Location::class),
            'leadCount' => $this->countSafely(QuoteRequest::class),
        ]);
    }

    private function countSafely(string $model): int
    {
        try {
            return $model::query()->count();
        } catch (\Throwable) {
            return 0;
        }
    }
}
