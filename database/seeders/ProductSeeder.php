<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop HP Pavilion',
            'description' => 'Ordinateur portable performant pour le travail et les loisirs.',
            'image' => 'https://cdn.pixabay.com/photo/2020/10/21/18/07/laptop-5673901_1280.jpg',
            'price' => 799,
        ]);

        Product::create([
            'name' => 'Casque Bluetooth',
            'description' => 'Casque sans fil avec réduction de bruit active.',
            'image' => 'https://cdn.pixabay.com/photo/2015/02/02/15/28/bar-621033_1280.jpg',
            'price' => 129,
        ]);

        Product::create([
            'name' => 'Mini Drone Caméra',
            'description' => 'Drone avec caméra HD pour prises de vue aériennes.',
            'image' => 'https://cdn.pixabay.com/photo/2018/05/01/13/04/miniature-3365503_1280.jpg',
            'price' => 249,
        ]);
    }
}
