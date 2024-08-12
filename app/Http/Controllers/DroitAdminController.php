<?php

namespace App\Http\Controllers;

use App\Models\DroitAdmin;
use Illuminate\Http\Request;

class DroitAdminController extends Controller
{
    public function index()
    {
        $droitAdmins = DroitAdmin::all();
        return view('droitAdmin.index', compact('droitAdmins'));
    }

    public function create()
    {
        return view('droitAdmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_droit_admin' => 'required|max:50',
            'niveau_droit_admin' => 'required|integer',
        ]);

        DroitAdmin::create($request->all());

        return redirect()->route('droitAdmin.index')->with('success', 'Droit admin ajouté avec succès');
    }

    public function edit($id)
    {
        $droitAdmin = DroitAdmin::findOrFail($id);
        return view('droitAdmin.edit', compact('droitAdmin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_droit_admin' => 'required|max:50',
            'niveau_droit_admin' => 'required|integer',
        ]);

        $droitAdmin = DroitAdmin::findOrFail($id);
        $droitAdmin->update($request->all());

        return redirect()->route('droitAdmin.index')->with('success', 'Droit admin mis à jour avec succès');
    }

    public function destroy($id)
    {
        $droitAdmin = DroitAdmin::findOrFail($id);
        $droitAdmin->delete();

        return redirect()->route('droitAdmin.index')->with('success', 'Droit admin supprimé avec succès');
    }
}
