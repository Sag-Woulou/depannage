<!-- resources/views/services/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Modifier un Service')

@section('content')
    <h1>Modifier un Service</h1>

    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="serviceName">Nom du Service</label>
            <input type="text" name="serviceName" id="serviceName" class="form-control" value="{{ $service->serviceName }}" required>
        </div>

        <div class="form-group">
            <label for="centre_id">Centre</label>
            <select name="centre_id" id="centre_id" class="form-control" required>
                @foreach($centres as $centre)
                    <option value="{{ $centre->id }}" {{ $service->centre_id == $centre->id ? 'selected' : '' }}>{{ $centre->centreDistribution }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exploitation_id">Exploitation</label>
            <select name="exploitation_id" id="exploitation_id" class="form-control" required>
                @foreach($exploitations as $exploitation)
                    <option value="{{ $exploitation->id }}" {{ $service->exploitation_id == $exploitation->id ? 'selected' : '' }}>{{ $exploitation->LibelleExpDepannage }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
@endsection
