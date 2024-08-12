@extends('layouts.app')

@section('title', 'Gestion des Rôles')

@section('content')
    <h1>Gestion des Rôles</h1>

    <div>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Ajouter un Rôle</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th>N°</th>
            <th>Nom</th>
            <th>Droits Admin</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $index => $role)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $role->nom_role }}</td>
                <td>
                    @forelse($role->droitAdmins as $droitAdmin)
                        <span class="badge bg-info">{{ $droitAdmin->nom_droit_admin }}</span>
                    @empty
                        N/A
                    @endforelse
                </td>
                <td>
                    <button href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Modifier</button>
                </td>
                <td>
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce rôle ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
