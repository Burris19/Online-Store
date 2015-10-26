<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id')->on('clients');

            $table->integer('id_store')->unsigned();
            $table->foreign('id_store')->references('id')->on('stores');

            $table->decimal('shipping_price',18,2);
            $table->boolean('is_urgent')->default(false);
            $table->decimal('amount',18,2);
            $table->decimal('total',18,2);

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
        Schema::drop('sales');
    }
}
