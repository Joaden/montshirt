<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_tag', function (Blueprint $table) {
            // Créer les attributs tag_id et produit_id
            $table->unsignedInteger('produit_id');
            $table->foreign('produit_id')
                ->references('id')->on('produits')->onDelete('cascade');

            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')
                ->references('id')->on('tags')->onDelete('cascade');

            // puis déclarer la clé primaire (association des deux attributs)
            $table->primary(['produit_id','tag_id']);

            // Activation des contraintes de clés primaires et étrangères
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
        Schema::dropIfExists('produit_tag');
    }
}
