@extends('layouts.app')

@section('title', 'Liste des Services')

@section('content')
    <h1>Liste des Services</h1>

    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Ajouter un Service</a>

    @if($services->isEmpty())
        <p>Aucun service disponible.</p>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Service</th>
                <th>Modifications</th>
                <th>Suppressions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->serviceName }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
