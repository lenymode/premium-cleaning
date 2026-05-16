@extends('backend.layouts.app', ['title' => 'Services'])

@section('content')
<div class="mb-4 flex justify-end"><a class="rounded bg-blue-700 px-4 py-2 text-white" href="{{ route('backend.services.create') }}">Add Service</a></div>
@include('backend.partials.resource-table', ['items' => $services, 'columns' => ['title', 'slug', 'is_active'], 'routePrefix' => 'backend.services'])
@endsection
