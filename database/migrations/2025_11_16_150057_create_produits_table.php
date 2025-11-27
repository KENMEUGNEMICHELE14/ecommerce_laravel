<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255);
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2)->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->foreignId('categorie_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->json('images')->nullable(); // si votre MySQL ne supporte pas JSON, utilisez ->text()->nullable()
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
