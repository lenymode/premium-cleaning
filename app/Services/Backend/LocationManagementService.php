<?php

namespace App\Services\Backend;

use App\Models\Location;
use Illuminate\Support\Str;

class LocationManagementService
{
    public function create(array $data): Location
    {
        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : Str::slug($data['name']);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        return Location::create($data);
    }

    public function update(Location $location, array $data): Location
    {
        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : Str::slug($data['name']);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $location->update($data);

        return $location;
    }
}
