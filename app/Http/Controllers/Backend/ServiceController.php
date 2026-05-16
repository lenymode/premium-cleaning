<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreServiceRequest;
use App\Http\Requests\Backend\UpdateServiceRequest;
use App\Models\Service;
use App\Services\Backend\ServiceManagementService;

class ServiceController extends Controller
{
    public function index()
    {
        return view('backend.services.index', [
            'services' => Service::query()->latest()->paginate(15),
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

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('backend.services.index')->with('status', 'Service deleted.');
    }
}
