@extends('backend.layouts.app', ['title' => 'Create Location'])

@section('content')
@include('backend.locations.form', ['action' => route('backend.locations.store'), 'method' => 'POST'])
@endsection
