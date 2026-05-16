<?php

namespace App\Services\Frontend;

use App\Data\QuoteRequestData;
use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Log;

class LeadCaptureService
{
    public function store(QuoteRequestData $data): ?QuoteRequest
    {
        try {
            return QuoteRequest::create([
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

            return null;
        }
    }
}
