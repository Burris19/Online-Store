<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleDetails', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_sale')->unsigned();
            $table->foreign('id_sale')->references('id')->on('sales');

            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('products');

            $table->integer('quantity');
            $table->decimal('price',18,2);

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
        Schema::drop('saleDetails');
    }
}
