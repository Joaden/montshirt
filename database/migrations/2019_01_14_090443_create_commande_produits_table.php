<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_produits', function (Blueprint $table) {
            $table->unsignedInteger('commande_id');
            $table->foreign('commande_id')
                ->references('id')
                ->on('commandes')->onDelete('cascade');

            $table->unsignedInteger('produit_id');
            $table->foreign('produit_id')
                ->references('id')
                ->on('produits')->onDelete('cascade');

            $table->primary(['commande_id','produit_id']);

            $table->integer('qte');
            $table->float('prix_unitaire_ttc');
            $table->float('prix_unitaire_ht');

            $table->float('prix_total_ttc');
            $table->float('prix_total_ht');

            Schema::enableForeignKeyConstraints();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_produits');
    }
}
