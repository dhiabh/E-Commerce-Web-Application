<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boutique_id')->constrained();
            $table->foreignId('panier_id')->constrained();
            $table->string('name');
            $table->float('price');
            $table->bigInteger('quantity');
            $table->text('description_article');
            $table->timestamps();

            $table->foreign('boutique_id')->references('id')->on('boutiques')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
