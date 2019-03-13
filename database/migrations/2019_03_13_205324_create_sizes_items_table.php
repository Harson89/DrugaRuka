<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes_items', function (Blueprint $table) {
            $table->increments('id');

            //foreign key from SIZES
            $table->integer('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('sizes');

            //FOREIGN KEY from items
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes_items');
    }
}
