<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            //foreign key from ITEMS
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items');

            //foreign key from ORDERS
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');

            //Kolicina narucenih artikala
            $table->integer('quantityXXXL')->default(0);
            $table->integer('quantityXXL')->default(0);
            $table->integer('quantityXL')->default(0);
            $table->integer('quantityL')->default(0);
            $table->integer('quantityM')->default(0);
            $table->integer('quantityS')->default(0);
            $table->integer('quantityXS')->default(0);

            //QUANITTY koliko je uzeo tih produkata


            //u kontroleru se provjerava da li postoji order koji nije zavrsen , ako ne postoji uopste onda pravi novi

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_items');
    }
}
