@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Nom d'utilisateur</th>
                <th>Email</th>
                <th>Modifications</th>
                <th>Suppressions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->nom }}</td>
                    <td>{{ $utilisateur->prenom }}</td>
                    <td>{{ $utilisateur->username }}</td>
                    <td>{{ $utilisateur->email }}</td>
                    <td>
                        <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}"
                            class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
