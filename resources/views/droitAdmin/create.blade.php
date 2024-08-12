@extends('layouts.app')

@section('title', 'Créer un Droit Admin')

@section('content')
    <h1>Créer un Droit Admin</h1>

    <form action="{{ route('droitAdmin.store') }}" method="POST">
        @csrf
        <div>
            <label for="nom_droit_admin"><strong>Nom</strong></label>
            <input type="text" name="nom_droit_admin" id="nom_droit_admin" required>
        </div>
        <div>
            <label for="niveau_droit_admin"><strong>Niveau</strong></label>
            <input type="number" name="niveau_droit_admin" id="niveau_droit_admin" required>
        </div>
        <button type="submit">Enregistrer</button>
        <a href="{{ route('droitAdmin.index') }}">Retour</a>
    </form>
@endsection
