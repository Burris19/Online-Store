<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailOrders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_order')->unsigned();
            $table->foreign('id_order')->references('id')->on('orders');

            $table->integer('id_store_origin')->unsigned();
            $table->foreign('id_store_origin')->references('id')->on('stores');

            $table->integer('id_store_destiny')->unsigned();
            $table->foreign('id_store_destiny')->references('id')->on('stores');

            $table->enum('type',['entrega','bodega']);
            $table->time('time');
            $table->enum('status',['bodega','entregado','en transito']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detailOrders');
    }
}
