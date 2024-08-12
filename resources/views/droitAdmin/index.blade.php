@extends('layouts.app')

@section('title', 'Gestion des droits admin')

@section('content')
    <h1>Gestion des droits d'admin</h1>

    <div>
        <a href="{{ route('droitAdmin.create') }}">Ajouter un droit admin</a>
    </div>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table >
        <thead>
            <tr>
                <th>Nom</th>
                <th>Niveau</th>
                <th>Modification</th>
                <th>Suppression</th>
            </tr>
        </thead>
        <tbody>
            @foreach($droitAdmins as $index => $droitAdmin)
                <tr>
                    <td>{{ $droitAdmin->nom_droit_admin }}</td>
                    <td>{{ $droitAdmin->niveau_droit_admin }}</td>
                    <td>
                        <a href="{{ route('droitAdmin.edit', $droitAdmin->id) }}"class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('droitAdmin.destroy', $droitAdmin->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer?');">
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
