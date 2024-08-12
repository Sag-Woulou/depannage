@extends('layouts.app')

@section('title', 'Ajouter un Droit d\'Accès')

@section('content')
    <h1>Ajouter un Droit d'Accès</h1>

    <form action="{{ route('droitAcces.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom_droit_access">Nom</label>
            <input type="text" id="nom_droit_access" name="nom_droit_access" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="niveau_droit_access">Niveau</label>
            <input type="number" id="niveau_droit_access" name="niveau_droit_access" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
@endsection
