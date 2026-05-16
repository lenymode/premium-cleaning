<?php

namespace App\Http\Controllers\Frontend;

use App\Data\QuoteRequestData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\StoreQuoteRequest;
use App\Services\Frontend\LeadCaptureService;

class QuoteRequestController extends Controller
{
    public function store(StoreQuoteRequest $request, LeadCaptureService $leadCapture)
    {
        $leadCapture->store(new QuoteRequestData(
            name: $request->string('name')->toString(),
            company: $request->input('company'),
            email: $request->string('email')->toString(),
            phone: $request->string('phone')->toString(),
            service: $request->string('service')->toString(),
            propertyType: $request->input('property_type'),
            postcode: $request->input('postcode'),
            message: $request->input('message'),
            source: 'website',
        ));

        return back()->with('status', 'Thank you. Your quote request has been received and the Crestwell team will contact you shortly.');
    }
}
