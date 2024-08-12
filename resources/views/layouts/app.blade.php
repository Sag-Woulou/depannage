<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Application Laravel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">




</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Application Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('utilisateurRoles.index') }}">Rôles Utilisateurs</a>
                </li>
                <!-- Lien vers la gestion des droits d'accès -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('droitAcces.index') }}">Droits d'Accès</a>
                </li>
                <!-- Lien vers la gestion des droits admin -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('droitAdmin.index') }}">Droits Admin</a>
                </li>
                <!-- Lien vers la gestion des zones -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('zones.index') }}">Zones</a>
                </li>
                <!-- Lien vers la gestion des services -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services.index') }}">Services</a>
                </li>
                <!-- Lien vers la liste des utilisateurs -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('utilisateurs.index') }}">Utilisateurs</a>
                </li>
                <!-- Lien vers la gestion des rôles -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">Rôles</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
