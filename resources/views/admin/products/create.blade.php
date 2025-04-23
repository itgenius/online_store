@extends('layouts.app')

@section('title', 'Ajouter un produit')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Ajouter un produit</h1>

    {{-- Formulaire d'ajout d'un produit --}}
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image du produit</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-success">Ajouter le produit</button>
    </form>
</div>
@endsection

