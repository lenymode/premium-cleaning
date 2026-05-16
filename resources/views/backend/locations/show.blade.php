@extends('backend.layouts.app', ['title' => $location->name])

@section('content')
<div class="mb-4 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
    <a href="{{ route('backend.locations.index') }}" class="text-sm font-bold text-slate-500 hover:text-blue-700">Back to locations</a>
    <a href="{{ route('backend.locations.edit', $location) }}" class="rounded-2xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20">Edit Location</a>
</div>
<section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
    <span class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $location->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">{{ $location->is_active ? 'Active' : 'Draft' }}</span>
    <h2 class="mt-4 text-3xl font-black">{{ $location->name }}</h2>
    <dl class="mt-5 grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl bg-slate-50 p-4"><dt class="text-sm font-bold text-slate-500">Slug</dt><dd class="mt-1 font-bold">{{ $location->slug }}</dd></div>
        <div class="rounded-2xl bg-slate-50 p-4"><dt class="text-sm font-bold text-slate-500">County</dt><dd class="mt-1 font-bold">{{ $location->county ?: 'N/A' }}</dd></div>
        <div class="rounded-2xl bg-slate-50 p-4"><dt class="text-sm font-bold text-slate-500">Postcode area</dt><dd class="mt-1 font-bold">{{ $location->postcode_area ?: 'N/A' }}</dd></div>
    </dl>
    <p class="mt-6 text-lg leading-8 text-slate-700">{{ $location->description ?: 'No description added yet.' }}</p>
</section>
@endsection
