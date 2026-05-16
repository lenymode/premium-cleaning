@extends('backend.layouts.app', ['title' => 'Dashboard'])

@section('content')
<div class="grid gap-4 md:grid-cols-4">
    @foreach([
        'Services' => $serviceCount,
        'Testimonials' => $testimonialCount,
        'Locations' => $locationCount,
        'Quote Requests' => $leadCount,
    ] as $label => $count)
        <div class="rounded bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">{{ $label }}</p>
            <p class="mt-2 text-3xl font-bold">{{ $count }}</p>
        </div>
    @endforeach
</div>
<div class="mt-6 rounded bg-white p-6 shadow-sm">
    <h2 class="text-lg font-semibold">Next Setup Step</h2>
    <p class="mt-2 text-slate-600">Run the raw SQL from <code>database/raw_sql/schema.sql</code> before using CRUD screens. Migrations have not been run.</p>
</div>
@endsection
