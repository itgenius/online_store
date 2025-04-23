
@extends('layouts.app')

@section('title', 'Tableau de bord Admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tableau de bord Administrateur</h1>

    {{-- Message de bienvenue --}}
    <div class="alert alert-success">
        Bienvenue dans le panneau d'administration !
    </div>

    {{-- Liens rapides de gestion --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Produits</h5>
                    <p class="card-text">Gérer tous les produits du site.</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light">Voir les produits</a>
                </div>
            </div>
        </div>

        {{-- Ajoute d'autres sections ici si nécessaire --}}
        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs</h5>
                    <p class="card-text">Gérer les utilisateurs enregistrés (à implémenter).</p>
                    <a href="#" class="btn btn-light disabled">Bientôt disponible</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Statistiques</h5>
                    <p class="card-text">Voir les statistiques du site (à venir).</p>
                    <a href="#" class="btn btn-light disabled">Bientôt disponible</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
