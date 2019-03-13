<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorySubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_subcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            //foreign key from category
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            //FOREIGN key for subcategory
            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('subcategories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_subcategories');
    }
}
