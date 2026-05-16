<?php

namespace App\Services\Backend;

use App\Models\QuoteRequest;

class QuoteRequestManagementService
{
    public function markAsReviewed(QuoteRequest $quoteRequest): QuoteRequest
    {
        $quoteRequest->update(['status' => 'reviewed']);

        return $quoteRequest;
    }
}
