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
            'newLeadCount' => $this->countSafely(QuoteRequest::class, ['status' => 'new']),
            'recentQuoteRequests' => $this->recentQuoteRequests(),
        ]);
    }

    private function countSafely(string $model, array $where = []): int
    {
        try {
            return $model::query()->where($where)->count();
        } catch (\Throwable) {
            return 0;
        }
    }

    private function recentQuoteRequests()
    {
        try {
            return QuoteRequest::query()->latest()->limit(5)->get();
        } catch (\Throwable) {
            return collect();
        }
    }
}
