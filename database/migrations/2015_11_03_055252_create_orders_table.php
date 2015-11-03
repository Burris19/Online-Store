<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_sale')->unsigned();
            $table->foreign('id_sale')->references('id')->on('sales');

            $table->integer('id_store_origin')->unsigned();
            $table->foreign('id_store_origin')->references('id')->on('stores');

            $table->integer('id_store_destiny')->unsigned();
            $table->foreign('id_store_destiny')->references('id')->on('stores');

            $table->enum('type',['En camino','Entregado']);
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
        Schema::drop('orders');
    }
}
