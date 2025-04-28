<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class CartController extends Controller
{
    // Affiche le panier
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Ajoute un produit au panier
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier.');
    }

    // Les autres méthodes 
    // Modifier la quantité d’un article
public function update(Request $request, $id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Quantité mise à jour.');
    }

    return redirect()->route('cart.index')->with('error', 'Produit non trouvé.');
}

// Retirer un article
public function remove($id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->route('cart.index')->with('success', 'Produit retiré du panier.');
}

// Vider le panier
public function clear()
{
    session()->forget('cart');
    return redirect()->route('cart.index')->with('success', 'Panier vidé.');
}
public function checkout(Request $request)
{
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
    }

    // Calculer le total
    $total = 0;
    foreach ($cart as $details) {
        $total += $details['price'] * $details['quantity'];
    }

    // Créer une commande
    $order = Order::create([
        'user_id' => \Illuminate\Support\Facades\Auth::user()->id, // utilisateur connecté
        'total' => $total,
        'status' => 'En attente', // ou 'Pending'
    ]);
    

    // Ajouter les détails de la commande

    // Vider le panier
    session()->forget('cart');

    return redirect()->route('cart.index')->with('success', 'Commande passée avec succès.');
}
}
