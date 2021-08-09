<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesArticlePanierPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_panier', function (Blueprint $table) {
            $table->primary(['article_id','panier_id']);
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('panier_id');
            $table->integer('quantity');
            $table->timestamps();
            $table->index('article_id');

            $table->index('panier_id');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_panier');
    }
}
