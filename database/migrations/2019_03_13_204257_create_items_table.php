<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->string('picture');

            //FOREIGN key from category_subcategory
            //$table->integer('cs_id')->unsigned();
            //$table->foreign('cs_id')->references('id')->on('category_subcategories');


               //FOREIGN key from category_subcategory
            //$table->integer('category_id')->unsigned();
            //$table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
