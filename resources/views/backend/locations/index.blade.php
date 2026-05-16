@extends('backend.layouts.app', ['title' => 'Locations'])

@section('content')
<div class="mb-4 flex justify-end"><a class="rounded bg-blue-700 px-4 py-2 text-white" href="{{ route('backend.locations.create') }}">Add Location</a></div>
@include('backend.partials.resource-table', ['items' => $locations, 'columns' => ['name', 'slug', 'postcode_area', 'is_active'], 'routePrefix' => 'backend.locations'])
@endsection
