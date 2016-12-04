<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{

  public function coordenacoes(){
    return $this->hasMany('App\Coordenacao');
  }

  public function supervisaos(){

    	return $this->hasMany('App\Supersvisao');
    }
}
