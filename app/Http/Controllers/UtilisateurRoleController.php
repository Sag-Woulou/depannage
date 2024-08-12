<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\UtilisateurRole;
use App\Models\Role;
use App\Models\Zone;
use App\Models\DroitAccess;
use Illuminate\Http\Request;

class UtilisateurRoleController extends Controller
{
    public function index()
    {
        // Récupère les rôles d'utilisateur avec les relations
        $utilisateurRoles = UtilisateurRole::with(['utilisateur', 'role', 'zone', 'droitAccess'])->get();
        return view('utilisateurRoles.index', compact('utilisateurRoles'));
    }

    public function create()
    {
        $utilisateurs = Utilisateur::all(); // Récupère tous les utilisateurs
        $roles = Role::all(); // Récupère tous les rôles
        $zones = Zone::all(); // Récupère toutes les zones
        $droitAccess = DroitAccess::all(); // Récupère tous les droits d'accès
        return view('utilisateurRoles.create', compact('utilisateurs', 'roles', 'zones', 'droitAccess'));
    }

    public function edit($id)
    {
        $utilisateurRole = UtilisateurRole::findOrFail($id);
        $utilisateurs = Utilisateur::all();
        $roles = Role::all();
        $zones = Zone::all(); // Récupère toutes les zones
        $droitAccess = DroitAccess::all(); // Récupère tous les droits d'accès
        return view('utilisateurRoles.edit', compact('utilisateurRole', 'utilisateurs', 'roles', 'zones', 'droitAccess'));
    }

    public function store(Request $request)
    {
        // Valide les données envoyées par le formulaire
        $request->validate([
            'utilisateur_id' => 'required|integer|exists:Utilisateurs,id',
            'role_id' => 'required|integer|exists:Roles,id',
            'zone_id' => 'required|integer|exists:zones,id',
            'droit_access_id' => 'nullable|integer|exists:Droit_access,id',
        ]);

        // Crée un nouveau rôle utilisateur avec les données validées
        UtilisateurRole::create($request->only(['utilisateur_id', 'role_id', 'zone_id', 'droit_access_id']));

        return redirect()->route('utilisateurRoles.index')->with('success', 'Rôle d\'utilisateur créé avec succès');
    }

    public function update(Request $request, $id)
    {
        // Valide les données envoyées par le formulaire
        $request->validate([
            'utilisateur_id' => 'required|integer|exists:Utilisateurs,id',
            'role_id' => 'required|integer|exists:Roles,id',
            'zone_id' => 'required|integer|exists:zones,id',
            'droit_access_id' => 'nullable|integer|exists:Droit_access,id',
        ]);

        // Récupère et met à jour le rôle utilisateur
        $utilisateurRole = UtilisateurRole::findOrFail($id);
        $utilisateurRole->update($request->only(['utilisateur_id', 'role_id', 'zone_id', 'droit_access_id']));

        return redirect()->route('utilisateurRoles.index')->with('success', 'Rôle d\'utilisateur mis à jour avec succès');
    }

    public function destroy($id)
    {
        // Supprime le rôle utilisateur
        $utilisateurRole = UtilisateurRole::findOrFail($id);
        $utilisateurRole->delete();

        return redirect()->route('utilisateurRoles.index')->with('success', 'Rôle d\'utilisateur supprimé avec succès');
    }
}
