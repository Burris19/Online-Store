<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routeDetail', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_sale')->unsigned();
            $table->foreign('id_sale')->references('id')->on('sales');

            $table->integer('id_route')->unsigned();
            $table->foreign('id_route')->references('id')->on('routes');

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
        Schema::drop('routeDetail');
    }
}
