<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('categories');

            $table->integer('id_provider')->unsigned();
            $table->foreign('id_provider')->references('id')->on('providers');

            $table->string('title');
            $table->string('description');
            $table->string('code');
            $table->decimal('price',18,2);
            $table->string('image');

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
        Schema::drop('products');
    }
}
