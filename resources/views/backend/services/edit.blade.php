@extends('backend.layouts.app', ['title' => 'Edit Service'])

@section('content')
@include('backend.services.form', ['action' => route('backend.services.update', $service), 'method' => 'PUT'])
@endsection
