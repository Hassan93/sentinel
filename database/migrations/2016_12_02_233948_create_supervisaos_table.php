<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisaos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->integer('tema_id');
            $table->integer('supervisor_id');
            $table->integer('estudante_id');
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
        Schema::drop('supervisaos');
    }
}
