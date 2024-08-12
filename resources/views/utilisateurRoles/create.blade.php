@extends('layouts.app')

@section('title', 'Ajouter un Rôle Utilisateur')

@section('content')
    <h1>Ajouter un Rôle Utilisateur</h1>

    <form action="{{ route('utilisateurRoles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="utilisateur_id" class="form-label">Utilisateur</label>
            <select name="utilisateur_id" id="utilisateur_id" class="form-control">
                @forelse($utilisateurs as $utilisateur)
                    <option value="{{ $utilisateur->id }}">{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</option>
                @empty
                    <option value="">Aucun utilisateur disponible</option>
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <label for="role_id" class="form-label">Rôle</label>
            <select name="role_id" id="role_id" class="form-control">
                @forelse($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->nom_role }}</option>
                @empty
                    <option value="">Aucun rôle disponible</option>
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <label for="zone_id" class="form-label">Zone</label>
            <select name="zone_id" id="zone_id" class="form-control">
                @forelse($zones as $zone)
                    <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                @empty
                    <option value="">Aucune zone disponible</option>
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <label for="droit_access_id" class="form-label">Droit d'Accès</label>
            <select name="droit_access_id" id="droit_access_id" class="form-control">
                <option value="">Aucun</option>
                @forelse($droitAccess as $droit)
                    <option value="{{ $droit->id }}">{{ $droit->nom_droit_access }}</option>
                @empty
                    <option value="">Aucun droit d'accès disponible</option>
                @endforelse
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
