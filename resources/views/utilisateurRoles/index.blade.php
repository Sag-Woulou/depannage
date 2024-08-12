@extends('layouts.app')

@section('title', 'Liste des Rôles Utilisateurs')

@section('content')
    <h1>Liste des Rôles Utilisateurs</h1>
    <a href="{{ route('utilisateurRoles.create') }}" class="btn btn-primary">Ajouter un Rôle Utilisateur</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
        <tr>
            <th>Utilisateur</th>
            <th>Rôle</th>
            <th>Zone</th>
            <th>Droit d'Accès</th>
            <th>Modifications</th>
            <th>Suppressions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($utilisateurRoles as $utilisateurRole)
            <tr>
                <td>{{ $utilisateurRole->utilisateur->nom }}</td>
                <td>{{ $utilisateurRole->role->nom_role }}</td>
                <td>{{ $utilisateurRole->zone->name }}</td>
                <td>{{ $utilisateurRole->droitAccess->nom_droit_access ?? 'Aucun' }}</td>
                <td>
                    <a href="{{ route('utilisateurRoles.edit', $utilisateurRole->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                </td>
                <td>
                    <form action="{{ route('utilisateurRoles.destroy', $utilisateurRole->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

