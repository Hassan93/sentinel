<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudante;

class StudantController extends Controller
{
  public function getIndex($id)
  {
    $estudante = Estudante::find($id);
    return view('home.studant',[$id])->withEstudante($estudante);
  }
}
