<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
  public function temas(){
  return $this->hasMany('App\Tema');
}
public function cursos(){
  return $this->belongsToMany('App\Curso', 'coordenacoes', 'disciplina_id', 'curso_id');
}
}
