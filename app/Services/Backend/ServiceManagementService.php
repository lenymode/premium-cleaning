<?php

namespace App\Services\Backend;

use App\Models\Service;
use Illuminate\Support\Str;

class ServiceManagementService
{
    public function create(array $data): Service
    {
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        return Service::create($data);
    }

    public function update(Service $service, array $data): Service
    {
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $service->update($data);

        return $service;
    }
}
