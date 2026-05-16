@extends('backend.layouts.app', ['title' => 'Create Testimonial'])

@section('content')
@include('backend.testimonials.form', ['action' => route('backend.testimonials.store'), 'method' => 'POST'])
@endsection
