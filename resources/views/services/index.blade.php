<!-- resources/views/services/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des Services')

@section('content')
    <h1>Liste des Services</h1>

    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Ajouter un Nouveau Service</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Service</th>
                <th>Modiffications</th>
                <th>Suppressions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->serviceName }}</td>
                    <td>
                        <button href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Modifier</button>
                    </td>
                    <td>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
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
