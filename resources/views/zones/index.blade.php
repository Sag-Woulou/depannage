@extends('layouts.app')

@section('title', 'Gestion des Zones')

@section('content')
    <h1>Gestion des Zones</h1>
    <a href="{{ route('zones.create') }}" class="btn btn-primary mb-3">Ajouter une Zone</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Centre d'Expédition</th>
            <th>Service</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
        </thead>
        <tbody>
        @foreach($zones as $zone)
            <tr>
                <td>{{ $zone->name }}</td>
                <td>
                    @if($zone->centreExploitation)
                        {{ $zone->centreExploitation->centreDistribution ?? 'N/A' }} <!-- Ajoutez d'autres attributs si nécessaire -->
                        {{ $zone->centreExploitation->expDepannage ?? 'N/A' }}
                        {{ $zone->centreExploitation->libelleExpDepannage ?? 'N/A' }}
                        {{ $zone->centreExploitation->distLibelle ?? 'N/A' }}
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    @if($zone->service)
                        {{ $zone->service->serviceName ?? 'N/A' }} <!-- Ajoutez d'autres attributs si nécessaire -->
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <a href="{{ route('zones.edit', $zone->id) }}" class="btn btn-warning btn-sm">Modifier</>
                </td>
                <td>
                    <form action="{{ route('zones.destroy', $zone->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette zone ?');">
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
