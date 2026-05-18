@extends('backend.layouts.app', ['title' => 'Quote Requests'])

@section('content')
<div class="mb-6 rounded-3xl border border-slate-200 bg-white p-4 shadow-sm">
    <form class="grid gap-3 md:grid-cols-[1fr_180px_auto]" method="GET">
        <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
        <input class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500" name="q" value="{{ request('q') }}" placeholder="Search leads by name, email, phone or service">
        <select class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500" name="status">
            <option value="">All statuses</option>
            <option value="new" @selected(request('status') === 'new')>New</option>
            <option value="reviewed" @selected(request('status') === 'reviewed')>Reviewed</option>
        </select>
        <div class="flex gap-2">
            <button class="rounded-2xl bg-slate-950 px-5 py-3 text-sm font-bold text-white">Filter</button>
            <a class="rounded-2xl border border-slate-200 px-5 py-3 text-sm font-bold text-slate-700" href="{{ route('backend.quote-requests.index') }}">Reset</a>
        </div>
    </form>
</div>
@include('backend.partials.resource-table', ['items' => $quoteRequests, 'columns' => ['name', 'email', 'phone', 'service', 'status'], 'routePrefix' => 'backend.quote-requests'])
@endsection
