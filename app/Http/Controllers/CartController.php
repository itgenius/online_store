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

    // Finaliser la commande et mettre à jour le stock
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

        // Lier les produits à la commande et décrémenter le stock
        foreach ($cart as $id => $details) {
            $order->products()->attach($id, ['quantity' => $details['quantity']]);

            // Mettre à jour le stock du produit
            $product = Product::find($id);
            if ($product && $product->stock >= $details['quantity']) {
                $product->stock -= $details['quantity'];
                $product->save();
            } else {
                return redirect()->route('cart.index')->with('error', "Le stock pour le produit {$product->name} est insuffisant.");
            }
        }

        // Vider le panier
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Commande passée avec succès.');
    }

    // Mise à jour de la commande et du stock
    public function updateOrderStatus($orderId, $status)
    {
        $order = Order::findOrFail($orderId);

        // Modifier le statut de la commande
        $order->status = $status;
        $order->save();

        // Si la commande est marquée comme 'livrée', on réduit le stock
        if ($status == 'livrée') {
            foreach ($order->products as $product) {
                // Réduire le stock du produit
                $product->stock -= $product->pivot->quantity; // 'pivot' si tu utilises une table de relation many-to-many
                $product->save();
            }
        }

        return redirect()->route('admin.orders.index')->with('success', 'Commande mise à jour avec succès');
    }
}
