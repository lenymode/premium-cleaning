<?php

namespace App\Services\Backend;

use App\Models\Testimonial;

class TestimonialManagementService
{
    public function __construct(private readonly ImageUploadService $images)
    {
    }

    public function create(array $data): Testimonial
    {
        $imageFile = $data['image_file'] ?? null;
        unset($data['image_file'], $data['remove_image']);

        if ($imageFile) {
            $data['image'] = $this->images->storeFrontendImage($imageFile, 'testimonials');
        }

        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        return Testimonial::create($data);
    }

    public function update(Testimonial $testimonial, array $data): Testimonial
    {
        $imageFile = $data['image_file'] ?? null;
        $removeImage = (bool) ($data['remove_image'] ?? false);
        unset($data['image_file'], $data['remove_image']);

        if ($imageFile) {
            $this->images->deleteFrontendImage($testimonial->image);
            $data['image'] = $this->images->storeFrontendImage($imageFile, 'testimonials');
        } elseif ($removeImage) {
            $this->images->deleteFrontendImage($testimonial->image);
            $data['image'] = null;
        }

        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $testimonial->update($data);

        return $testimonial;
    }
}
