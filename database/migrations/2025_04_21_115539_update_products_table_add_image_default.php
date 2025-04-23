<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('image')->default('default.jpg')->change(); // Ajoute une valeur par défaut
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('image')->nullable()->change(); // Supprime la valeur par défaut
    });
}
    
};

