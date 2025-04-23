@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Mon Panier</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <form action="{{ route('cart.clear') }}" method="POST" class="mb-3">
            @csrf
            <button class="btn btn-danger">Vider le panier</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Sous-total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $details)
                    @php 
                        $subtotal = $details['price'] * $details['quantity'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control w-50 me-2" />
                                <button type="submit" class="btn btn-sm btn-primary">Mettre à jour</button>
                            </form>
                        </td>
                        <td>{{ $details['price'] }} €</td>
                        <td>{{ $subtotal }} €</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Total : {{ $total }} €</h4>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection
