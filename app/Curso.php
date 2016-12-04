<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function disciplinas(){
      return $this->belongsToMany('App\Disciplina', 'coordenacoes', 'curso_id', 'disciplina_id');
    }
}
