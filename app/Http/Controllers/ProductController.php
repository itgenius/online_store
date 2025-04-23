<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Affiche tous les produits
    public function index()
    {
        $products = Product::all(); //  Récupère tous les produits de la DB
        return view('products.index', compact('products'));
    }

    // Affiche un produit spécifique
    public function show($id)
    {
        $product = Product::findOrFail($id); //  findOrFail lance une 404 si non trouvé
        return view('products.show', compact('product'));
    }

    // Affiche la liste des produits pour l'admin
    public function adminIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Modifier un produit (affiche le formulaire de modification)
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Mettre à jour un produit
    public function update(Request $request, $id)
    {
        // Récupérer le produit par son ID
        $product = Product::findOrFail($id);

        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Si une image est fournie
        if ($request->hasFile('image')) {
            // Validation de l'image
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            // Nom unique pour l'image
            $imageName = time().'.'.$request->image->extension();
            // Déplacer l'image vers le dossier public/images
            $request->image->move(public_path('images'), $imageName);

            // Ajouter l'image aux données validées
            $validatedData['image'] = $imageName;
        }

        // Mise à jour du produit
        $product->update($validatedData);

        // Rediriger vers la liste des produits avec un message de succès
        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    // Supprimer un produit
    public function destroy($id)
    {
        // Récupérer le produit à supprimer
        $product = Product::findOrFail($id);

        // Supprimer le produit
        $product->delete();

        // Rediriger vers la liste des produits avec un message de succès
        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès.');
    }

    // Créer un produit (affiche le formulaire d'ajout)
    public function create()
    {
        return view('admin.products.create');
    }

    // Sauvegarder un nouveau produit
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Si une image est fournie
        if ($request->hasFile('image')) {
            // Validation de l'image
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Nom unique pour l'image
            $imageName = time().'.'.$request->image->extension();
            // Déplacer l'image vers le dossier public/images
            $request->image->move(public_path('images'), $imageName);

            // Ajouter l'image aux données validées
            $validatedData['image'] = $imageName;
        }

        // Création du produit
        Product::create($validatedData);

        // Rediriger vers la liste des produits avec un message de succès
        return redirect()->route('admin.products.index')->with('success', 'Produit créé avec succès.');
    }
}
