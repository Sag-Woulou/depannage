@extends('layouts.app')

@section('title', 'Modifier un Droit Admin')

@section('content')
    <h1>Modifier un Droit Admin</h1>

    <form action="{{ route('droitAdmin.update', $droitAdmin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nom_droit_admin"><strong>Nom</strong></label>
            <input type="text" name="nom_droit_admin" id="nom_droit_admin" value="{{ $droitAdmin->nom_droit_admin }}" required>
        </div>
        <div>
            <label for="niveau_droit_admin"><strong>Niveau</strong></label>
            <input type="number" name="niveau_droit_admin" id="niveau_droit_admin" value="{{ $droitAdmin->niveau_droit_admin }}" required>
        </div>
        <button type="submit">Enregistrer</button>
        <a href="{{ route('droitAdmin.index') }}">Retour</a>
    </form>
@endsection
