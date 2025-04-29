<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Met à jour le statut de la commande.
     * Si la commande est marquée comme "livrée", le stock est décrémenté.
     */
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        // Si la commande est livrée, décrémenter le stock
        if ($order->status === 'livrée') {
            foreach ($order->products as $product) {
                $product->stock -= $product->pivot->quantity;
                $product->save();
            }
        }

        return redirect()->back()->with('success', 'Statut de la commande mis à jour.');
    }

    /**
     * Affiche la liste des commandes dans la section admin.
     */
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Affiche les détails d'une commande spécifique.
     */
    public function show($id)
    {
        $order = Order::with(['user', 'products'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
}
