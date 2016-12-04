<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
  public function disciplina(){
    return $this->belongsTo('App\Disciplina', 'disciplina_id');
  }

  public function supervisaos(){
    return $this->hasMany('App\Supersvisao');
  }
  public function instituicaos(){
    return $this->belongsToMany('App\Instituicao', 'instituicao_tema', 'tema_id', 'instituicao_id');
  }
}
