@extends('backend.layouts.app', ['title' => 'Quote Request'])

@section('content')
<div class="rounded bg-white p-6 shadow-sm">
    <h2 class="text-2xl font-bold">{{ $quoteRequest->name }}</h2>
    <dl class="mt-4 grid gap-3 md:grid-cols-2">
        <div><dt class="text-sm text-slate-500">Company</dt><dd>{{ $quoteRequest->company ?: 'N/A' }}</dd></div>
        <div><dt class="text-sm text-slate-500">Email</dt><dd>{{ $quoteRequest->email }}</dd></div>
        <div><dt class="text-sm text-slate-500">Phone</dt><dd>{{ $quoteRequest->phone }}</dd></div>
        <div><dt class="text-sm text-slate-500">Service</dt><dd>{{ $quoteRequest->service }}</dd></div>
        <div><dt class="text-sm text-slate-500">Property Type</dt><dd>{{ $quoteRequest->property_type ?: 'N/A' }}</dd></div>
        <div><dt class="text-sm text-slate-500">Postcode</dt><dd>{{ $quoteRequest->postcode ?: 'N/A' }}</dd></div>
    </dl>
    <p class="mt-6">{{ $quoteRequest->message }}</p>
</div>
@endsection
