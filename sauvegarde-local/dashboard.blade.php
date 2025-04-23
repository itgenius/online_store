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
        {{-- Gestion des produits --}}
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Produits</h5>
                    <p class="card-text">Gérer tous les produits du site.</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light">Voir les produits</a>
                </div>
            </div>
        </div>

        {{-- Gestion des utilisateurs --}}
        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs</h5>
                    <p class="card-text">Gérer les utilisateurs enregistrés.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light">Voir les utilisateurs</a>
                </div>
            </div>
        </div>

        {{-- Gestion des commandes --}}
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Commandes</h5>
                    <p class="card-text">Gérer les commandes des clients.</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-light">Voir les commandes</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Autres fonctionnalités à venir --}}
    <div class="row">
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
