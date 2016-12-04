<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('actividades', function (Blueprint $table) {
             $table->increments('id');
             $table->string('actividade');
             $table->string('descricao');
             $table->string('resultado');
             $table->date('data_inicio');
             $table->date('data_fim');
             $table->integer('supervisao_id');
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
         Schema::drop('actividades');
     }
}
