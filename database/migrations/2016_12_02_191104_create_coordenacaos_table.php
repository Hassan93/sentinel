<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordenacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordenacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->integer('curso_id');
            $table->integer('disciplina_id');
            $table->integer('coordenador_id');
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
        Schema::drop('coordenacaos');
    }
}
