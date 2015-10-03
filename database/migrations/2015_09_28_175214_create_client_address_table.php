<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id')->on('clients');

            $table->integer('id_city')->unsigned();
            $table->foreign('id_city')->references('id')->on('cities');

            $table->string('address');
            $table->string('observation');

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
        Schema::drop('client_addresses');
    }
}
