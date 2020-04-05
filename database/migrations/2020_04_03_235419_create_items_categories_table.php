<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('items_categories', function (Blueprint $table) {
          $table->unsignedBigInteger('itemId');
          $table->unsignedBigInteger('catId');
          $table->timestamps();

          $table->unique(['itemId', 'catId']);
          $table->foreign('itemId')->references('id')->on('items');
          $table->foreign('catId')->references('id')->on('categories');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_categories');
    }
}
