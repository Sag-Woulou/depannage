<?php

namespace App\Http\Controllers;

use App\Models\DroitAccess;
use Illuminate\Http\Request;

class DroitAccessController extends Controller
{
    public function index()
    {
        // Utilisez 'all()' pour récupérer tous les enregistrements
        $droitAccesList = DroitAccess::all();
        return view('droitAcces.index', compact('droitAccesList'));
    }

    public function create()
    {
        return view('droitAcces.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom_droit_access' => 'required|max:50',
            'niveau_droit_access' => 'required|integer',
        ]);

        // Création de l'enregistrement
        DroitAccess::create([
            'nom_droit_access' => $request->input('nom_droit_access'),
            'niveau_droit_access' => $request->input('niveau_droit_access'),
        ]);

        return redirect()->route('droitAcces.index')->with('success', 'Droit d\'accès ajouté avec succès');
    }

    public function edit($id)
    {
        // Récupération de l'enregistrement pour modification
        $droitAcces = DroitAccess::findOrFail($id);
        return view('droitAcces.edit', compact('droitAcces'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom_droit_access' => 'required|max:50',
            'niveau_droit_access' => 'required|integer',
        ]);

        // Récupération et mise à jour de l'enregistrement
        $droitAcces = DroitAccess::findOrFail($id);
        $droitAcces->update([
            'nom_droit_access' => $request->input('nom_droit_access'),
            'niveau_droit_access' => $request->input('niveau_droit_access'),
        ]);

        return redirect()->route('droitAcces.index')->with('success', 'Droit d\'accès mis à jour avec succès');
    }

    public function destroy($id)
    {
        // Récupération et suppression de l'enregistrement
        $droitAcces = DroitAccess::findOrFail($id);
        $droitAcces->delete();

        return redirect()->route('droitAcces.index')->with('success', 'Droit d\'accès supprimé avec succès');
    }
}
