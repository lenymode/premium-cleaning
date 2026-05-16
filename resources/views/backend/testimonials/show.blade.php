@extends('backend.layouts.app', ['title' => $testimonial->name])

@section('content')
<div class="mb-4 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
    <a href="{{ route('backend.testimonials.index') }}" class="text-sm font-bold text-slate-500 hover:text-blue-700">Back to testimonials</a>
    <a href="{{ route('backend.testimonials.edit', $testimonial) }}" class="rounded-2xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20">Edit Testimonial</a>
</div>
<section class="grid gap-6 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:grid-cols-[280px_1fr]">
    @if($testimonial->image)
        <img src="{{ asset('frontend/assets/img/'.$testimonial->image) }}" alt="{{ $testimonial->name }}" class="h-72 w-full rounded-3xl object-cover">
    @else
        <div class="grid h-72 place-items-center rounded-3xl bg-blue-600 text-5xl font-black text-white">{{ str($testimonial->name)->substr(0, 1) }}</div>
    @endif
    <div>
        <span class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $testimonial->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">{{ $testimonial->is_active ? 'Active' : 'Draft' }}</span>
        <h2 class="mt-4 text-3xl font-black">{{ $testimonial->name }}</h2>
        <p class="mt-1 text-slate-500">{{ $testimonial->role }}{{ $testimonial->company ? ' · '.$testimonial->company : '' }}</p>
        <div class="mt-4 text-amber-400">@for($i = 0; $i < $testimonial->rating; $i++)★@endfor</div>
        <p class="mt-5 text-lg leading-8 text-slate-700">{{ $testimonial->quote }}</p>
    </div>
</section>
@endsection
