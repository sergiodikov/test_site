<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_favorite_skus', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('sku_id');
            $table->timestamps();

            $table->index('user_id');
            $table->index('sku_id');
            $table->unique(['user_id', 'sku_id']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_favorite_skus');
    }
}
