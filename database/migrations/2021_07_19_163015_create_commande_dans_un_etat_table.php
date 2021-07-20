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
            $table->id();
            $table->boolean('statut');

            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');

            $table->unsignedBigInteger('etat_commande_id');
            $table->foreign('etat_commande_id')->references('id')->on('etat_commandes')->onDelete('cascade');
            
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
