@extends('layouts.app')

@section('title', 'Modifier un Rôle')

@section('content')
    <h1>Modifier un Rôle</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nom_role">Nom du rôle</label>
            <input type="text" name="nom_role" id="nom_role" value="{{ old('nom_role', $role->nom_role) }}" required>
            @error('nom_role')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Droits Admin</label>
            @foreach($droitAdmins as $droitAdmin)
                <div>
                    <input type="checkbox" name="droit_admin_ids[]" id="droit_admin_{{ $droitAdmin->id }}" value="{{ $droitAdmin->id }}"
                        {{ in_array($droitAdmin->id, old('droit_admin_ids', $role->droitAdmins->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                    <label for="droit_admin_{{ $droitAdmin->id }}">{{ $droitAdmin->nom_droit_admin }}</label>
                </div>
            @endforeach
            @error('droit_admin_ids')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Enregistrer</button>
        <a href="{{ route('roles.index') }}">Retour</a>
    </form>
@endsection
