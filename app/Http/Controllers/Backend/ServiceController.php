<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreServiceRequest;
use App\Http\Requests\Backend\UpdateServiceRequest;
use App\Models\Service;
use App\Services\Backend\ImageUploadService;
use App\Services\Backend\ServiceManagementService;

class ServiceController extends Controller
{
    public function index()
    {
        $perPage = $this->tablePerPage();

        $query = Service::query()
            ->when(request('q'), fn ($query, $search) => $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
            }))
            ->when(request()->filled('status'), fn ($query) => $query->where('is_active', request('status') === 'active'))
            ->orderBy('sort_order')
            ->latest();

        return view('backend.services.index', [
            'services' => $query->paginate($perPage)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('backend.services.create', ['service' => new Service()]);
    }

    public function store(StoreServiceRequest $request, ServiceManagementService $serviceManagement)
    {
        $serviceManagement->create($request->validated());

        return redirect()->route('backend.services.index')->with('status', 'Service created.');
    }

    public function show(Service $service)
    {
        return view('backend.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('backend.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service, ServiceManagementService $serviceManagement)
    {
        $serviceManagement->update($service, $request->validated());

        return redirect()->route('backend.services.index')->with('status', 'Service updated.');
    }

    public function destroy(Service $service, ImageUploadService $images)
    {
        $images->deleteFrontendImage($service->image);
        $service->delete();

        return redirect()->route('backend.services.index')->with('status', 'Service deleted.');
    }
}
