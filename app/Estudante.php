<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    public function supervisaos(){

    	return $this->hasMany('App\Supersvisao');
    }
}
