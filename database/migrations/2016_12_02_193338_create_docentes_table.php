<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('docentes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('apelido');
          $table->string('nome');
          $table->string('email')->unique();
          $table->string('celular')->unique();
          $table->string('area_de_formacao');
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
        Schema::drop('docentes');
    }
}
