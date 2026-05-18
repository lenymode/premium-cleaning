<?php

namespace App\Services\Frontend;

use App\Data\QuoteRequestData;
use App\Mail\QuoteRequestReceived;
use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LeadCaptureService
{
    public function store(QuoteRequestData $data): ?QuoteRequest
    {
        $quoteRequest = null;

        try {
            $quoteRequest = QuoteRequest::create([
                'name' => $data->name,
                'company' => $data->company,
                'email' => $data->email,
                'phone' => $data->phone,
                'service' => $data->service,
                'property_type' => $data->propertyType,
                'postcode' => $data->postcode,
                'message' => $data->message,
                'source' => $data->source,
                'status' => 'new',
            ]);
        } catch (\Throwable $exception) {
            Log::warning('Quote request could not be stored. Run the raw SQL schema before enabling persistence.', [
                'error' => $exception->getMessage(),
                'lead' => [
                    'name' => $data->name,
                    'email' => $data->email,
                    'phone' => $data->phone,
                    'service' => $data->service,
                ],
            ]);
        }

        try {
            Mail::to(config('site.lead_recipient'))->send(new QuoteRequestReceived($data));
        } catch (\Throwable $exception) {
            Log::warning('Quote request notification email could not be sent.', [
                'error' => $exception->getMessage(),
                'recipient' => config('site.lead_recipient'),
            ]);
        }

        return $quoteRequest;
    }
}
