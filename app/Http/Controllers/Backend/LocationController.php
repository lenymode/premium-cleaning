<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreLocationRequest;
use App\Http\Requests\Backend\UpdateLocationRequest;
use App\Models\Location;
use App\Services\Backend\LocationManagementService;

class LocationController extends Controller
{
    public function index()
    {
        $query = Location::query()
            ->when(request('q'), fn ($query, $search) => $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('postcode_area', 'like', "%{$search}%");
            }))
            ->when(request()->filled('status'), fn ($query) => $query->where('is_active', request('status') === 'active'))
            ->orderBy('sort_order')
            ->latest();

        return view('backend.locations.index', [
            'locations' => $query->paginate(12)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('backend.locations.create', ['location' => new Location()]);
    }

    public function store(StoreLocationRequest $request, LocationManagementService $locationManagement)
    {
        $locationManagement->create($request->validated());

        return redirect()->route('backend.locations.index')->with('status', 'Location created.');
    }

    public function show(Location $location)
    {
        return view('backend.locations.show', compact('location'));
    }

    public function edit(Location $location)
    {
        return view('backend.locations.edit', compact('location'));
    }

    public function update(UpdateLocationRequest $request, Location $location, LocationManagementService $locationManagement)
    {
        $locationManagement->update($location, $request->validated());

        return redirect()->route('backend.locations.index')->with('status', 'Location updated.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('backend.locations.index')->with('status', 'Location deleted.');
    }
}
