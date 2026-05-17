<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;

class QuoteRequestController extends Controller
{
    public function index()
    {
        $perPage = $this->tablePerPage();

        $query = QuoteRequest::query()
            ->when(request('q'), fn ($query, $search) => $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('service', 'like', "%{$search}%");
            }))
            ->when(request('status'), fn ($query, $status) => $query->where('status', $status))
            ->latest();

        return view('backend.quote-requests.index', [
            'quoteRequests' => $query->paginate($perPage)->withQueryString(),
        ]);
    }

    public function show(QuoteRequest $quoteRequest)
    {
        if ($quoteRequest->status === 'new') {
            $quoteRequest->update(['status' => 'reviewed']);
        }

        return view('backend.quote-requests.show', compact('quoteRequest'));
    }

    public function destroy(QuoteRequest $quoteRequest)
    {
        $quoteRequest->delete();

        return redirect()->route('backend.quote-requests.index')->with('status', 'Quote request deleted.');
    }
}
