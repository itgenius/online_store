<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('name'); // Nom du produit
            $table->text('description'); // Description détaillée
            $table->string('image'); // URL ou chemin de l'image
            $table->integer('price'); // Prix en centimes (ou € selon format)
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
