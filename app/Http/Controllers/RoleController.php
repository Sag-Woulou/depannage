<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\DroitAdmin;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Afficher tous les rôles
    public function index()
    {
        $roles = Role::with('droitAdmins')->get();
        return view('roles.index', compact('roles'));
    }


    public function create()
    {
        $droitAdmins = DroitAdmin::all();
        return view('roles.create', compact('droitAdmins'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nom_role' => 'required|string|max:255',
            'droit_admin_ids' => 'required|array',
            'droit_admin_ids.*' => 'exists:droit_admin,id', // Validation des IDs
        ]);

        $role = Role::create([
            'nom_role' => $request->nom_role,
        ]);

        // Attache les droits admins au rôle
        $role->droitAdmins()->attach($request->droit_admin_ids);

        return redirect()->route('roles.index')->with('success', 'Rôle(s) créé(s) avec succès');
    }

    // Afficher le formulaire pour modifier un rôle existant
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $droitAdmins = DroitAdmin::all();
        return view('roles.edit', compact('role', 'droitAdmins'));
    }

    // Mettre à jour un rôle existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_role' => 'required|string|max:255',
            'droit_admin_ids' => 'array|nullable',
            'droit_admin_ids.*' => 'exists:droit_admin,id', // Validation des IDs
        ]);

        $role = Role::findOrFail($id);
        $role->update(['nom_role' => $request->nom_role]);

        // Synchronise les droits admins
        $role->droitAdmins()->sync($request->droit_admin_ids);

        return redirect()->route('roles.index')->with('success', 'Rôle mis à jour avec succès');
    }

    // Supprimer un rôle
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->droitAdmins()->detach(); // Détache les droits admin associés
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Rôle supprimé avec succès');
    }
}
