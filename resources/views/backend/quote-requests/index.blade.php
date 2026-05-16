@extends('backend.layouts.app', ['title' => 'Quote Requests'])

@section('content')
@include('backend.partials.resource-table', ['items' => $quoteRequests, 'columns' => ['name', 'email', 'phone', 'service', 'status'], 'routePrefix' => 'backend.quote-requests'])
@endsection
