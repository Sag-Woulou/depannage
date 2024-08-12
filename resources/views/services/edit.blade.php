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
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
@endsection
