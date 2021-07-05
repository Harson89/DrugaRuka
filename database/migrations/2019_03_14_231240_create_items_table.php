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

            //kolicina velicina
            $table->integer('XXXLQuantity')->default(0);
            $table->integer('XXLQuantity')->default(0);
            $table->integer('XLQuantity')->default(0);
            $table->integer('LQuantity')->default(0);
            $table->integer('MQuantity')->default(0);
            $table->integer('SQuantity')->default(0);
            $table->integer('XSQuantity')->default(0);

            //spol
            $table->integer('gender')->default(1);
            //unisex = 1
            //male = 2
            //female = 3
            //kids = 4

            //FOREIGN key from category
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
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
