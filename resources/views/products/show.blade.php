
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>{{ $product->name }}</h2>
    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid mb-3">
    <p>{{ $product->description }}</p>
    <p class="fw-bold">Prix : {{ $product->price }} €</p>    
    {{-- <a href="#" class="btn btn-success">Ajouter au panier</a> --}}
    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success">Ajouter au panier</a>

    <a href="{{ url('/products') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection

