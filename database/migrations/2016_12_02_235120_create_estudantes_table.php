<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('estudantes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('apelido');
          $table->string('nome');
          $table->string('email')->unique()->unique();
          $table->string('celular');
          $table->integer('curso_id');
          $table->integer('disciplina_id');
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
        Schema::drop('estudantes');
    }
}
