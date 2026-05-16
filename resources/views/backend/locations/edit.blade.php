@extends('backend.layouts.app', ['title' => 'Edit Location'])

@section('content')
@include('backend.locations.form', ['action' => route('backend.locations.update', $location), 'method' => 'PUT'])
@endsection
