@extends('layouts.app')

@section('title', 'Page d\'accueil')

@section('content')
    <div class="text-center py-4">
        <h1 class="mb-4 text-primary">Bienvenue sur notre Boutique en ligne !</h1>
        <p class="lead">Profitez de nos prix avantageux.</p>
        <a href="{{ url('/products') }}" class="btn btn-primary mt-3">Voir tous nos produits</a>
    </div>

    <!-- Section produits -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Nos Produits les plus récents</h2>
        @if(count($latestProducts) > 0)
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($latestProducts as $product)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="price fw-bold mb-3">Prix: {{ $product->price }} €</p>
                                <a href="{{ url('/products/' . $product->id) }}" class="btn btn-outline-primary mt-auto">Voir les détails</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted">Aucun produit disponible pour le moment.</p>
        @endif
    </div>
@endsection
