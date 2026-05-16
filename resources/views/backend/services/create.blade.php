@extends('backend.layouts.app', ['title' => 'Create Service'])

@section('content')
@include('backend.services.form', ['action' => route('backend.services.store'), 'method' => 'POST'])
@endsection
