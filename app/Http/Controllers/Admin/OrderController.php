<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    // Affiche la liste des commandes
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    // Affiche une commande
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    // Change le statut de la commande
    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return redirect()->route('admin.orders.index')->with('success', 'Statut de la commande mis à jour.');
    }
}


