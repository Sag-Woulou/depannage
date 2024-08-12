<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\CentreDistributionSansRef;
use App\Models\Service;

class ZoneController extends Controller
{
    public function index()
    {
        // Charger les relations nécessaires pour l'affichage
        $zones = Zone::with(['centreExploitation', 'service'])->get();
        return view('zones.index', compact('zones'));
    }

    public function create()
    {
        // Récupérer toutes les colonnes sauf l'id pour les centres
        $centres = CentreDistributionSansRef::all(['id', 'centreDistribution', 'expDepannage', 'libelleExpDepannage', 'distLibelle']); // Inclure 'id' pour les options du select
        $services = Service::all();
        return view('zones.create', compact('centres', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'centre_exploitation_id' => 'required|exists:centreDistributionSansRef,id',
            'service_id' => 'required|exists:service,id',
        ]);

        Zone::create([
            'name' => $request->name,
            'centre_exploitation_id' => $request->centre_exploitation_id,
            'service_id' => $request->service_id,
        ]);

        return redirect()->route('zones.index')->with('success', 'Zone créée avec succès.');
    }

    public function edit(Zone $zone)
    {
        // Récupérer toutes les colonnes sauf l'id pour les centres
        $centres = CentreDistributionSansRef::all(['id', 'centreDistribution', 'expDepannage', 'libelleExpDepannage', 'distLibelle']); // Inclure 'id' pour les options du select
        $services = Service::all();
        return view('zones.edit', compact('zone', 'centres', 'services'));
    }

    public function update(Request $request, Zone $zone)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'centre_exploitation_id' => 'required|exists:centreDistributionSansRef,id',
            'service_id' => 'required|exists:service,id',
        ]);

        $zone->update([
            'name' => $request->name,
            'centre_exploitation_id' => $request->centre_exploitation_id,
            'service_id' => $request->service_id,
        ]);

        return redirect()->route('zones.index')->with('success', 'Zone mise à jour avec succès.');
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();
        return redirect()->route('zones.index')->with('success', 'Zone supprimée avec succès.');
    }
}
