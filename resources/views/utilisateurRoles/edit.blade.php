@extends('layouts.app')

@section('title', 'Éditer un Rôle Utilisateur')

@section('content')
    <h1>Éditer un Rôle Utilisateur</h1>

    <form action="{{ route('utilisateurRoles.update', $utilisateurRole->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="utilisateur_id" class="form-label">Utilisateur</label>
            <select name="utilisateur_id" id="utilisateur_id" class="form-control">
                @foreach($utilisateurs as $utilisateur)
                    <option value="{{ $utilisateur->id }}" {{ $utilisateurRole->utilisateur_id == $utilisateur->id ? 'selected' : '' }}>
                        {{ $utilisateur->nom }} {{ $utilisateur->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="role_id" class="form-label">Rôle</label>
            <select name="role_id" id="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $utilisateurRole->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->nom_role }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="zone_id" class="form-label">Zone</label>
            <select name="zone_id" id="zone_id" class="form-control">
                @foreach($zones as $zone)
                    <option value="{{ $zone->id }}" {{ $utilisateurRole->zone_id == $zone->id ? 'selected' : '' }}>
                        {{ $zone->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="droit_access_id" class="form-label">Droit d'Accès</label>
            <select name="droit_access_id" id="droit_access_id" class="form-control">
                <option value="">Aucun</option>
                @foreach($droitAccess as $droit)
                    <option value="{{ $droit->id }}" {{ $utilisateurRole->droit_access_id == $droit->id ? 'selected' : '' }}>
                        {{ $droit->nom_droit_access }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
