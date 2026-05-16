@extends('backend.layouts.app', ['title' => $location->name])

@section('content')
<div class="rounded bg-white p-6 shadow-sm">
    <h2 class="text-2xl font-bold">{{ $location->name }}</h2>
    <p class="mt-1 text-slate-500">{{ $location->county }} {{ $location->postcode_area }}</p>
    <p class="mt-4">{{ $location->description }}</p>
</div>
@endsection
