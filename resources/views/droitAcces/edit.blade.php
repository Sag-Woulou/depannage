@extends('layouts.app')

@section('title', 'Modifier un Droit d\'Accès')

@section('content')
    <h1>Modifier un Droit d'Accès</h1>

    <form action="{{ route('droitAcces.update', $droitAcces->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom_droit_access">Nom</label>
            <input type="text" id="nom_droit_access" name="nom_droit_access" class="form-control" value="{{ $droitAcces->nom_droit_access }}" required>
        </div>
        <div class="form-group">
            <label for="niveau_droit_access">Niveau</label>
            <input type="number" id="niveau_droit_access" name="niveau_droit_access" class="form-control" value="{{ $droitAcces->niveau_droit_access }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
@endsection
