@extends('layouts.app')

@section('title', 'Modifier le produit')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Modifier le produit</h1>

    {{-- Formulaire de modification --}}
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
        </div>

        {{-- Afficher l'image actuelle si elle existe --}}
        <div class="mb-3">
            <label for="current_image" class="form-label">Image actuelle</label>
            @if ($product->image)
                <div>
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px;">
                </div>
            @else
                <span>Aucune image</span>
            @endif
        </div>

        {{-- Champ pour télécharger une nouvelle image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Nouvelle image (si nécessaire)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
