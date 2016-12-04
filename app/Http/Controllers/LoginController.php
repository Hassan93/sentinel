<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Estudante;

class LoginController extends Controller
{
    public function login()
    {
      return view('authentication.login');
    }
    public function postLogin(Request $request)
    {

      Sentinel::authenticate($request->all());
      $slug = Sentinel::getUser()->roles()->first()->slug;

      if ($slug == 'admin')
        return redirect('/admin');
      elseif ($slug == 'studant') {
        $estudantes = Estudante::all();
        foreach ($estudantes as $estudante) {
          if ($estudante->email == Sentinel::getUser()->email) {
              return redirect('/studant'.'/'.$estudante->id);
          }
        }

      }
    }

    public function logout($value='')
    {
      Sentinel::logout();
      return redirect('/login');
    }
}
