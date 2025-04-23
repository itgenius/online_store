@extends('layouts.app')

@section('title', 'Gestion des produits')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Gestion des produits</h1>

    {{-- Bouton pour ajouter un nouveau produit --}}
    <div class="mb-3">
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">+ Ajouter un produit</a>
    </div>

    {{-- Vérifie s'il y a des produits --}}
    @if ($products->isEmpty())
        <div class="alert alert-warning">
            Aucun produit trouvé.
        </div>
    @else
        {{-- Tableau des produits --}}
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Image</th> {{-- Ajout de la colonne image --}}
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>{{ number_format($product->price, 2) }} €</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            {{-- Vérifie si l'image existe et l'affiche --}}
                            @if ($product->image && file_exists(public_path('images/' . $product->image)))
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px;">
                            @else
                                <span>Aucune image</span>
                            @endif
                        </td>
                        <td>{{ $product->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">Modifier</a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
