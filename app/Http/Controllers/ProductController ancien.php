<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() // Afficher la liste des produits "dummy data"
{
    $products = [
        [
            'name' => 'Nom du produit 1',
            'description' => 'Description courte du produit. Lorem ipsum dolor sit amet.',
            'price' => '599,99 €',
            'image' => 'https://cdn.pixabay.com/photo/2020/10/21/18/07/laptop-5673901_1280.jpg',
        ],
        [
            'name' => 'Nom du produit 2',
            'description' => 'Description courte du produit. Lorem ipsum dolor sit amet.',
            'price' => '249,99 €',
            'image' => 'https://cdn.pixabay.com/photo/2015/02/02/15/28/bar-621033_1280.jpg',
        ],
        [
            'name' => 'Nom du produit 3',
            'description' => 'Description courte du produit. Lorem ipsum dolor sit amet.',
            'price' => '199,99 €',
            'image' => 'https://cdn.pixabay.com/photo/2018/05/01/13/04/miniature-3365503_1280.jpg',
        ],
    ];

    return view('products.index', compact('products'));
}


public function show($id)
{
    $products = [
        [
            'name' => 'Nom du produit 1',
            'description' => 'Description courte du produit. Lorem ipsum dolor sit amet.',
            'price' => '599,99 €',
            'image' => 'https://cdn.pixabay.com/photo/2020/10/21/18/07/laptop-5673901_1280.jpg',
        ],
        [
            'name' => 'Nom du produit 2',
            'description' => 'Description courte du produit. Lorem ipsum dolor sit amet.',
            'price' => '249,99 €',
            'image' => 'https://cdn.pixabay.com/photo/2015/02/02/15/28/bar-621033_1280.jpg',
        ],
        [
            'name' => 'Nom du produit 3',
            'description' => 'Description courte du produit. Lorem ipsum dolor sit amet.',
            'price' => '199,99 €',
            'image' => 'https://cdn.pixabay.com/photo/2018/05/01/13/04/miniature-3365503_1280.jpg',
        ],
    ];

    // Vérifie si l'ID est valide
    if (!isset($products[$id])) {
        abort(404); // Page non trouvée
    }

    $product = $products[$id];

    return view('products.show', compact('product'));
}


}

