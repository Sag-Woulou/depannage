<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    // Affiche la liste des utilisateurs
    public function index()
    {
        $utilisateurs= Utilisateur::all();
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    // Affiche le formulaire de création d'un utilisateur
    public function create()
    {
        return view('utilisateurs.create');
    }

    // Stocke un nouvel utilisateur dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:Utilisateurs',
            'email' => 'required|string|email|max:255|unique:Utilisateurs',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // Affiche le formulaire d'édition d'un utilisateur
    public function edit(Utilisateur $utilisateur)
    {
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    // Met à jour les informations d'un utilisateur
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:Utilisateurs,username,' . $utilisateur->id,
            'email' => 'required|string|email|max:255|unique:Utilisateurs,email,' . $utilisateur->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $utilisateur->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $utilisateur->password,
        ]);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Supprime un utilisateur de la base de données
    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}


