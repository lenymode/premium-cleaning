@extends('backend.layouts.app', ['title' => $service->title])

@section('content')
<div class="mb-4 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
    <a href="{{ route('backend.services.index') }}" class="text-sm font-bold text-slate-500 hover:text-blue-700">Back to services</a>
    <a href="{{ route('backend.services.edit', $service) }}" class="rounded-2xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20">Edit Service</a>
</div>
<div class="grid gap-6 xl:grid-cols-[1fr_360px]">
    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <span class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $service->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">{{ $service->is_active ? 'Active' : 'Draft' }}</span>
        <h2 class="mt-4 text-3xl font-black">{{ $service->title }}</h2>
        <p class="mt-3 text-lg text-slate-600">{{ $service->excerpt }}</p>
        <div class="admin-rich-text-content mt-6 rounded-3xl bg-slate-50 p-5 text-slate-700">
            @if(str_contains($service->description, '<'))
                {!! $service->description !!}
            @else
                <p>{{ $service->description }}</p>
            @endif
        </div>
        @if($service->benefits)
            <h3 class="mt-6 font-black">Benefits</h3>
            <ul class="mt-3 grid gap-2 md:grid-cols-2">
                @foreach($service->benefits as $benefit)
                    <li class="rounded-2xl bg-blue-50 p-3 text-sm font-bold text-blue-800">{{ $benefit }}</li>
                @endforeach
            </ul>
        @endif
    </section>
    <aside class="space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            @if($service->image)
                <img src="{{ asset('frontend/assets/img/'.$service->image) }}" alt="{{ $service->title }}" class="h-64 w-full rounded-3xl object-cover">
            @else
                <div class="grid h-64 place-items-center rounded-3xl bg-slate-100 text-sm font-bold text-slate-400">No image</div>
            @endif
        </section>
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="font-black">SEO</h3>
            <dl class="mt-4 space-y-3 text-sm">
                <div><dt class="font-bold text-slate-500">Slug</dt><dd>{{ $service->slug }}</dd></div>
                <div><dt class="font-bold text-slate-500">Meta title</dt><dd>{{ $service->meta_title ?: 'N/A' }}</dd></div>
                <div><dt class="font-bold text-slate-500">Meta description</dt><dd>{{ $service->meta_description ?: 'N/A' }}</dd></div>
            </dl>
        </section>
    </aside>
</div>
@endsection
