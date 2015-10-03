<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storeAddresses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_store')->unsigned();
            $table->foreign('id_store')->references('id')->on('stores');


            $table->integer('id_city')->unsigned();
            $table->foreign('id_city')->references('id')->on('cities');

            $table->string('observation');
            $table->string('address');

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
        Schema::drop('storeAddresses');
    }
}
