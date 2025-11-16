<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignePaniersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_paniers', function (Blueprint $table) {
             $table->id(); // ID AUTO-INCREMENT
        $table->foreignId('panier_id')->constrained('paniers')->onDelete('cascade');
        $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');
        $table->integer('quantite');
        $table->timestamps();
        
        // On ajoute ca pour Éviter les doublons
        $table->unique(['panier_id', 'produit_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_paniers');
    }
}
