<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storeProducts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idStore')->unsigned();
            $table->foreign('idStore')->references('id')->on('stores');

            $table->integer('idProduct')->unsigned();
            $table->foreign('idProduct')->references('id')->on('products');

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
        Schema::drop('storeProducts');
    }
}
