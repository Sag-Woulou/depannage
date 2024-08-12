<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Récupère tous les services avec leurs zones associées
        $services = Service::with('zones')->get();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'serviceName' => 'required|string|max:255',
        ]);

        // Création d'un nouveau service
        Service::create([
            'serviceName' => $request->serviceName,
        ]);

        return redirect()->route('services.index')->with('success', 'Service créé avec succès.');
    }

    public function edit(Service $service)
    {
        // Affichage de la page d'édition d'un service
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        // Validation des données
        $request->validate([
            'serviceName' => 'required|string|max:255',
        ]);

        // Mise à jour du service
        $service->update([
            'serviceName' => $request->serviceName,
        ]);

        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy(Service $service)
    {
        // Suppression du service
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès.');
    }
}
