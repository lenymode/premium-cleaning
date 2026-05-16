@extends('backend.layouts.app', ['title' => 'Quote Request'])

@section('content')
<div class="mb-4">
    <a href="{{ route('backend.quote-requests.index') }}" class="text-sm font-bold text-slate-500 hover:text-blue-700">Back to quote requests</a>
</div>
<div class="grid gap-6 xl:grid-cols-[1fr_340px]">
    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <span class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $quoteRequest->status === 'new' ? 'bg-blue-100 text-blue-700' : 'bg-slate-100 text-slate-600' }}">{{ str($quoteRequest->status)->headline() }}</span>
        <h2 class="mt-4 text-3xl font-black">{{ $quoteRequest->name }}</h2>
        <p class="mt-1 text-slate-500">{{ $quoteRequest->company ?: 'No company supplied' }}</p>
        <dl class="mt-6 grid gap-4 md:grid-cols-2">
            <div class="rounded-2xl bg-slate-50 p-4"><dt class="text-sm font-bold text-slate-500">Email</dt><dd class="mt-1 font-bold"><a href="mailto:{{ $quoteRequest->email }}" class="text-blue-700">{{ $quoteRequest->email }}</a></dd></div>
            <div class="rounded-2xl bg-slate-50 p-4"><dt class="text-sm font-bold text-slate-500">Phone</dt><dd class="mt-1 font-bold"><a href="tel:{{ $quoteRequest->phone }}" class="text-blue-700">{{ $quoteRequest->phone }}</a></dd></div>
            <div class="rounded-2xl bg-slate-50 p-4"><dt class="text-sm font-bold text-slate-500">Service</dt><dd class="mt-1 font-bold">{{ $quoteRequest->service }}</dd></div>
            <div class="rounded-2xl bg-slate-50 p-4"><dt class="text-sm font-bold text-slate-500">Property type</dt><dd class="mt-1 font-bold">{{ $quoteRequest->property_type ?: 'N/A' }}</dd></div>
            <div class="rounded-2xl bg-slate-50 p-4"><dt class="text-sm font-bold text-slate-500">Postcode</dt><dd class="mt-1 font-bold">{{ $quoteRequest->postcode ?: 'N/A' }}</dd></div>
            <div class="rounded-2xl bg-slate-50 p-4"><dt class="text-sm font-bold text-slate-500">Source</dt><dd class="mt-1 font-bold">{{ str($quoteRequest->source)->headline() }}</dd></div>
        </dl>
        <div class="mt-6 rounded-3xl bg-slate-50 p-5">
            <h3 class="font-black">Message</h3>
            <p class="mt-3 whitespace-pre-line text-slate-700">{{ $quoteRequest->message ?: 'No message supplied.' }}</p>
        </div>
    </section>
    <aside class="space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="font-black">Quick contact</h3>
            <div class="mt-4 grid gap-3">
                <a href="mailto:{{ $quoteRequest->email }}" class="rounded-2xl bg-blue-600 px-4 py-3 text-center text-sm font-black text-white">Email Client</a>
                <a href="tel:{{ $quoteRequest->phone }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-center text-sm font-black text-slate-700">Call Client</a>
            </div>
        </section>
    </aside>
</div>
@endsection
