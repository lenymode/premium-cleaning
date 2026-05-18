@extends('backend.layouts.app', ['title' => 'Testimonials'])

@section('content')
<div class="mb-6 rounded-3xl border border-slate-200 bg-white p-4 shadow-sm">
    <form class="grid gap-3 md:grid-cols-[1fr_180px_auto]" method="GET">
        <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
        <input class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500" name="q" value="{{ request('q') }}" placeholder="Search testimonials by name, role or company">
        <select class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500" name="status">
            <option value="">All statuses</option>
            <option value="active" @selected(request('status') === 'active')>Active</option>
            <option value="draft" @selected(request('status') === 'draft')>Draft</option>
        </select>
        <div class="flex gap-2">
            <button class="rounded-2xl bg-slate-950 px-5 py-3 text-sm font-bold text-white">Filter</button>
            <a class="rounded-2xl border border-slate-200 px-5 py-3 text-sm font-bold text-slate-700" href="{{ route('backend.testimonials.index') }}">Reset</a>
        </div>
    </form>
</div>
<div class="mb-4 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
    <div>
        <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Social proof</p>
        <h2 class="text-2xl font-black">Testimonials</h2>
    </div>
    <a class="rounded-2xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700" href="{{ route('backend.testimonials.create') }}">Add Testimonial</a>
</div>
@include('backend.partials.resource-table', ['items' => $testimonials, 'columns' => ['image', 'name', 'role', 'rating', 'is_active'], 'routePrefix' => 'backend.testimonials'])
@endsection
