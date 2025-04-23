<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
}
