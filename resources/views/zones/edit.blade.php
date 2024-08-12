@extends('layouts.app')

@section('title', 'Modifier la Zone')

@section('content')
    <h1>Modifier la Zone</h1>

    <form action="{{ route('zones.update', $zone->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom de la zone</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $zone->name) }}" required>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="centre_exploitation_id">Centre d'Expédition</label>
            <select name="centre_exploitation_id" id="centre_exploitation_id" class="form-control" required>
                @foreach($centres as $centre)
                    <option value="{{ $centre->id }}" {{ old('centre_exploitation_id', $zone->centre_exploitation_id) == $centre->id ? 'selected' : '' }}>
                        {{ $centre->centreDistribution }} - {{ $centre->expDepannage }} - {{ $centre->libelleExpDepannage }} - {{ $centre->distLibelle }} <!-- Assurez-vous que ces attributs sont présents dans le modèle -->
                    </option>
                @endforeach
            </select>
            @error('centre_exploitation_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="service_id">Service</label>
            <select name="service_id" id="service_id" class="form-control" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ old('service_id', $zone->service_id) == $service->id ? 'selected' : '' }}>
                        {{ $service->serviceName }}
                    </option>
                @endforeach
            </select>
            @error('service_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
