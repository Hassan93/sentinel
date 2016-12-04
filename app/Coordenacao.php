<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenacao extends Model
{
    public function docente(){
      return $this->belongsTo('App\Docente','coordenador_id');
    }

    public function disciplina(){
      return $this->belongsTo('App\Disciplina','disciplina_id');
    }
    public function curso(){
      return $this->belongsTo('App\Curso','curso_id');
    }

    public function supervisaos(){

    	return $this->hasMany('App\Supersvisao');
    }
}
