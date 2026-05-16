@extends('backend.layouts.app', ['title' => 'Testimonials'])

@section('content')
<div class="mb-4 flex justify-end"><a class="rounded bg-blue-700 px-4 py-2 text-white" href="{{ route('backend.testimonials.create') }}">Add Testimonial</a></div>
@include('backend.partials.resource-table', ['items' => $testimonials, 'columns' => ['name', 'role', 'rating', 'is_active'], 'routePrefix' => 'backend.testimonials'])
@endsection
