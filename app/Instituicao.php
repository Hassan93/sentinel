<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
  public function temas(){
  return $this->belongsToMany('App\Tema', 'instituicao_tema', 'instituicao_id', 'tema_id');
}
}
