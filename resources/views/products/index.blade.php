@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Nos Produits</h2> 
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="price fw-bold mb-3">Prix: {{ $product->price }} €</p>
                        <p class="text-muted">Stock disponible : {{ $product->stock }}</p>

                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-primary">Voir les détails</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
