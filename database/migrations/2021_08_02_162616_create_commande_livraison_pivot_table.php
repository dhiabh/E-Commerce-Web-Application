<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeLivraisonPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraison_commande', function (Blueprint $table) {
            $table->primary(['commande_id', 'livraison_id']);
            

            $table->unsignedBigInteger('commande_id');
            $table->index('commande_id');

            $table->unsignedBigInteger('livraison_id');
            $table->index('livraison_id');
            
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
        Schema::dropIfExists('livraison_commande');
    }
}
