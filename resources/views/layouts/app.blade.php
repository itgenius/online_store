<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Boutique en ligne')</title>
    
    {{-- Vite pour les assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap CSS via CDN -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    
    <!-- Bootstrap Icons via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
</head>
<body>
    <!-- Menu principal -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- La marque du site à gauche (optionnel si tu veux l'enlever) -->
            <a class="navbar-brand" href="/">Ma Boutique</a>

            <!-- Bouton de basculement pour les petits écrans -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu de navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Liste du menu à droite (Accueil, Produits, Contact, Dashboard, Déconnexion) -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- Liens de navigation -->
                    <li class="nav-item">
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>

                    @auth
                        <!-- Si l'utilisateur est un admin -->
                        @if(auth()->user()->is_admin ?? false)
                            <li class="nav-item">
                                {{-- <<a href="{{ route('dashboard') }}">Dashboard</a> --}}
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="display: inline; padding: 0;">Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer inclus -->
    @include('partials.footer')

    <!-- Bootstrap JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
