<?php

namespace App\Services\Frontend;

use App\Data\LocationData;
use App\Data\TestimonialData;
use App\Models\Location;
use App\Models\Testimonial;

class PageDataService
{
    public function testimonials(): array
    {
        try {
            $testimonials = Testimonial::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderByDesc('created_at')
                ->get();

            if ($testimonials->isNotEmpty()) {
                return $testimonials->map(fn (Testimonial $testimonial) => new TestimonialData(
                    $testimonial->name,
                    $testimonial->role ?: 'Customer',
                    $testimonial->quote,
                    $testimonial->rating,
                    $testimonial->company,
                    $testimonial->image,
                ))->all();
            }
        } catch (\Throwable) {
            //
        }

        return [
            new TestimonialData('Sarah Mitchell', 'Operations Director', 'Crestwell gives us consistent cleaning standards across our office sites. Communication is clear, standards are documented, and the team feels dependable.', 5, 'Regional Consultancy'),
            new TestimonialData('Daniel Harper', 'Property Manager', 'Their end of tenancy and communal area support has made handovers smoother. The team understands commercial urgency and keeps us updated.', 5, 'Harper Property Group'),
            new TestimonialData('Priya Shah', 'Facilities Lead', 'Professional, responsive and easy to work with. Crestwell feels like a facilities partner, not just a cleaning supplier.', 5, 'Serviced Workspace Provider'),
        ];
    }

    public function locations(): array
    {
        try {
            $locations = Location::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get();

            if ($locations->isNotEmpty()) {
                return $locations->map(fn (Location $location) => new LocationData(
                    $location->name,
                    $location->slug,
                    $location->description ?: '',
                    $location->postcode_area,
                ))->all();
            }
        } catch (\Throwable) {
            //
        }

        return [
            new LocationData('Central Business Districts', 'central-business-districts', 'Office, retail and managed workspace cleaning for central commercial locations.'),
            new LocationData('Residential Developments', 'residential-developments', 'Cleaning support for apartment blocks, landlords, agents and property managers.'),
            new LocationData('Serviced Accommodation Zones', 'serviced-accommodation-zones', 'Turnaround cleaning for Airbnb, serviced apartments and short-stay properties.'),
            new LocationData('Industrial & Trade Premises', 'industrial-trade-premises', 'Scheduled deep cleaning, pressure washing and facilities support for operational sites.'),
        ];
    }

    public function processSteps(): array
    {
        return [
            ['title' => 'Tell Us What You Need', 'text' => 'Send the property type, service requirement, location and preferred schedule.'],
            ['title' => 'Receive a Clear Quote', 'text' => 'We prepare a practical scope with timing, frequency and service expectations.'],
            ['title' => 'Professional Delivery', 'text' => 'Vetted cleaners complete the work with consistent checks and communication.'],
            ['title' => 'Ongoing Support', 'text' => 'Scale from one-off cleaning to recurring facilities support as your needs grow.'],
        ];
    }

    public function trustPoints(): array
    {
        return [
            'Commercially focused cleaning teams',
            'Vetted, reliable and professionally managed cleaners',
            'Insured service delivery ready for business premises',
            'Scalable support for offices, landlords, agents and managed properties',
        ];
    }
}
