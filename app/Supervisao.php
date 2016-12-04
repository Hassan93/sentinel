<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisao extends Model
{
    public function tema(){

    	return $this->belongsTo('App\Tema', 'tema_id');
    }

    public function coordenacao(){

    	return $this->belongsTo('App\Coordenacao', 'coordenacao_id');
    }
     public function docente(){

    	return $this->belongsTo('App\Docente', 'supervisor_id');
    }

     public function estudante(){

    	return $this->belongsTo('App\Estudante', 'estudante_id');
    }
    public function actividades(){
    return $this->hasMany('App\Actividade');
  }
}
