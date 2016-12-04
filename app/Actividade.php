<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
    public function supervisao()
    {
      return $this->belongsTo('App\Supervisao', 'supervisao_id');
    }
}
