@extends('backend.layouts.app', ['title' => $testimonial->name])

@section('content')
<div class="rounded bg-white p-6 shadow-sm">
    <h2 class="text-2xl font-bold">{{ $testimonial->name }}</h2>
    <p class="mt-1 text-slate-500">{{ $testimonial->role }} {{ $testimonial->company }}</p>
    <p class="mt-4">{{ $testimonial->quote }}</p>
</div>
@endsection
