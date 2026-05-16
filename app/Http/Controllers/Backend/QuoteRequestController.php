<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;

class QuoteRequestController extends Controller
{
    public function index()
    {
        return view('backend.quote-requests.index', [
            'quoteRequests' => QuoteRequest::query()->latest()->paginate(20),
        ]);
    }

    public function show(QuoteRequest $quoteRequest)
    {
        return view('backend.quote-requests.show', compact('quoteRequest'));
    }

    public function destroy(QuoteRequest $quoteRequest)
    {
        $quoteRequest->delete();

        return redirect()->route('backend.quote-requests.index')->with('status', 'Quote request deleted.');
    }
}
