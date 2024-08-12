@extends('layouts.app')

@section('title', 'Gestion des droits d\'accès')

@section('content')
    <h1>Gestion des droits d'accès</h1>
    <a href="{{ route('droitAcces.create') }}" class="btn btn-primary mb-3">Ajouter un Droit d'Accès</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($droitAccesList->isEmpty())
        <div class="alert alert-info">
            Aucune donnée à afficher.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Niveau</th>
                    <th>Modification</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                @foreach($droitAccesList as $droitAcces)
                    <tr>
                        <td>{{ $droitAcces->nom_droit_access }}</td>
                        <td>{{ $droitAcces->niveau_droit_access }}</td>
                        <td>
                            <button href="{{ route('droitAcces.edit', $droitAcces->id) }}" class="btn btn-warning btn-sm">Modifier</button>
                        </td>
                        <td>
                            <form action="{{ route('droitAcces.destroy', $droitAcces->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce droit d\'accès ?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
