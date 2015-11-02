<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_type_employee')->unsigned();
            $table->foreign('id_type_employee')->references('id')->on('typeEmployees');

            $table->integer('id_store')->unsigned();
            $table->foreign('id_store')->references('id')->on('stores');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

            $table->string('name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('image');
            $table->integer('license_no');
            $table->enum('type_license', ['A','B','C','D']);

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
        Schema::drop('employees');
    }
}
