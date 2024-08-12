@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier un utilisateur</h1>
        <form action="{{ route('utilisateurs.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $user->nom }}" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $user->prenom }}" required>
            </div>
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe (laisser vide pour ne pas changer)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
        </form>
    </div>
@endsection
