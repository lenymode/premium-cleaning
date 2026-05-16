<?php

namespace App\Services\Backend;

use App\Models\Service;
use Illuminate\Support\Str;

class ServiceManagementService
{
    public function __construct(private readonly ImageUploadService $images)
    {
    }

    public function create(array $data): Service
    {
        $imageFile = $data['image_file'] ?? null;
        unset($data['image_file'], $data['remove_image']);

        if ($imageFile) {
            $data['image'] = $this->images->storeFrontendImage($imageFile, 'services');
        }

        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : Str::slug($data['title']);
        $data['icon_class'] = filled($data['icon_class'] ?? null) ? trim($data['icon_class']) : 'fa-solid fa-broom';
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['benefits'] = $this->cleanList($data['benefits'] ?? []);
        $data['faqs'] = $this->cleanFaqs($data['faqs'] ?? []);

        return Service::create($data);
    }

    public function update(Service $service, array $data): Service
    {
        $imageFile = $data['image_file'] ?? null;
        $removeImage = (bool) ($data['remove_image'] ?? false);
        unset($data['image_file'], $data['remove_image']);

        if ($imageFile) {
            $this->images->deleteFrontendImage($service->image);
            $data['image'] = $this->images->storeFrontendImage($imageFile, 'services');
        } elseif ($removeImage) {
            $this->images->deleteFrontendImage($service->image);
            $data['image'] = null;
        }

        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : Str::slug($data['title']);
        $data['icon_class'] = filled($data['icon_class'] ?? null) ? trim($data['icon_class']) : 'fa-solid fa-broom';
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['benefits'] = $this->cleanList($data['benefits'] ?? []);
        $data['faqs'] = $this->cleanFaqs($data['faqs'] ?? []);
        $service->update($data);

        return $service;
    }

    private function cleanList(array $items): array
    {
        return array_values(array_filter(array_map(
            fn ($item) => trim((string) $item),
            $items,
        )));
    }

    private function cleanFaqs(array $faqs): array
    {
        return array_values(array_filter(array_map(function ($faq) {
            $question = trim((string) ($faq['question'] ?? ''));
            $answer = trim((string) ($faq['answer'] ?? ''));

            return $question && $answer ? compact('question', 'answer') : null;
        }, $faqs)));
    }
}
