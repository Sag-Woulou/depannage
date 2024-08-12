<!-- resources/views/services/create.blade.php -->
@extends('layouts.app')

@section('title', 'Créer un Service')

@section('content')
    <h1>Créer un Service</h1>

    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="serviceName">Nom du Service</label>
            <input type="text" name="serviceName" id="serviceName" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
