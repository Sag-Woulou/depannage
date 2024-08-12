<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'serviceName' => 'required|string|max:255',
        ]);

        Service::create([
            'serviceName' => $request->serviceName,
        ]);

        return redirect()->route('services.index')->with('success', 'Service créé avec succès.');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'serviceName' => 'required|string|max:255',
        ]);

        $service->update([
            'serviceName' => $request->serviceName,
        ]);

        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès.');
    }
}
