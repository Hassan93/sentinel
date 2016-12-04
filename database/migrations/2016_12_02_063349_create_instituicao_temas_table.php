<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituicaoTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
   {
       Schema::create('instituicao_temas', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('instituicao_id');
           $table->integer('tema_id');
           $table->string('tema_status');
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
       Schema::drop('instituicao_temas');
   }
}
