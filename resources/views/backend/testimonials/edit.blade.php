@extends('backend.layouts.app', ['title' => 'Edit Testimonial'])

@section('content')
@include('backend.testimonials.form', ['action' => route('backend.testimonials.update', $testimonial), 'method' => 'PUT'])
@endsection
