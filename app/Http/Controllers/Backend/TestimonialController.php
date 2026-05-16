<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreTestimonialRequest;
use App\Http\Requests\Backend\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Services\Backend\TestimonialManagementService;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('backend.testimonials.index', [
            'testimonials' => Testimonial::query()->latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('backend.testimonials.create', ['testimonial' => new Testimonial()]);
    }

    public function store(StoreTestimonialRequest $request, TestimonialManagementService $testimonialManagement)
    {
        $testimonialManagement->create($request->validated());

        return redirect()->route('backend.testimonials.index')->with('status', 'Testimonial created.');
    }

    public function show(Testimonial $testimonial)
    {
        return view('backend.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial, TestimonialManagementService $testimonialManagement)
    {
        $testimonialManagement->update($testimonial, $request->validated());

        return redirect()->route('backend.testimonials.index')->with('status', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('backend.testimonials.index')->with('status', 'Testimonial deleted.');
    }
}
