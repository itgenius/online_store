@extends('layouts.app')

@section('title', 'Détail Commande')

@section('content')
<div class="container mt-5">
    <h2>Commande #{{ $order->id }}</h2>

    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Utilisateur :</strong> {{ $order->user->name }}</li>
        <li class="list-group-item"><strong>Total :</strong> {{ $order->total }} €</li>
        <li class="list-group-item"><strong>Statut :</strong> {{ $order->status }}</li>
        <li class="list-group-item"><strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</li>
    </ul>

    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Changer le statut :</label>
            <select name="status" id="status" class="form-control">
                <option value="En attente" {{ $order->status == 'En attente' ? 'selected' : '' }}>En attente</option>
                <option value="En cours" {{ $order->status == 'En cours' ? 'selected' : '' }}>En cours</option>
                <option value="Livré" {{ $order->status == 'Livré' ? 'selected' : '' }}>Livré</option>
                <option value="Annulé" {{ $order->status == 'Annulé' ? 'selected' : '' }}>Annulé</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
