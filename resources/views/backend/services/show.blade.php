@extends('backend.layouts.app', ['title' => $service->title])

@section('content')
<div class="rounded bg-white p-6 shadow-sm">
    <h2 class="text-2xl font-bold">{{ $service->title }}</h2>
    <p class="mt-2 text-slate-600">{{ $service->excerpt }}</p>
    <div class="prose mt-4 max-w-none">{{ $service->description }}</div>
</div>
@endsection
