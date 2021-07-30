<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeDansUnEtatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_etat_commande', function (Blueprint $table) {
            $table->primary(['commande_id', 'etat_commande_id']);

            $table->unsignedBigInteger('commande_id');
            $table->index('commande_id');

            $table->unsignedBigInteger('etat_commande_id');
            $table->index('etat_commande_id');

            $table->boolean('statut');
            
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
        Schema::dropIfExists('commande_etat_commande');
    }
}
