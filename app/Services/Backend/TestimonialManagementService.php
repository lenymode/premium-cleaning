<?php

namespace App\Services\Backend;

use App\Models\Testimonial;

class TestimonialManagementService
{
    public function create(array $data): Testimonial
    {
        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        return Testimonial::create($data);
    }

    public function update(Testimonial $testimonial, array $data): Testimonial
    {
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $testimonial->update($data);

        return $testimonial;
    }
}
