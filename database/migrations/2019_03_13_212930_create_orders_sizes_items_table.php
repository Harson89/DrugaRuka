<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersSizesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_sizes_items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('quantity');

            //Forein key from orders
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');

            //Foreign key from sizes_items
            $table->integer('sizes_item_id')->unsigned();
            $table->foreign('sizes_item_id')->references('id')->on('sizes_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_sizes_items');
    }
}
