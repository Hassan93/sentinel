<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Docente;
use App\Coordenacao;
use App\Disciplina;
use Mail;

class MailController extends Controller
{
    public function basic_mail($idCord, $idDoc){
      $coordenador = Docente::find($idDoc);
      $corden     = Coordenacao::find($idCord);
      $disciplina =Disciplina::find($corden->disciplina_id);

      $data = ['name'=>''.$coordenador->nome.' '.$coordenador->apelido, 'email'=>''.$coordenador->email, 'disciplina'=>''.$disciplina->designacao, 'password'=>'123456u'];

      Mail::send(['text'=>'mail'], $data, function($message){
        $corden     = Coordenacao::orderBy('id', 'desc')->first();
        $coordenador = Docente::find($corden->coordenador_id);
        $message->to($coordenador->email, $coordenador->nome.' '.$coordenador->apelido)->subject('Alocacao de Coordenadores');
        $message->from('uem.assane@gmail.com', 'Assane Combo');
      });

    return redirect()->route('coordenacaos.show', $idCord);
    }

    public function html_mail(){
      $data = ['name'=>'Tucha'];
      Mail::send(['text'=>'mail'], $data, function($message){
        $message->to('melo.lp4@gmail.com', 'Lucas Melo')->subject('Send HTML e-mail froM laravel');
        $message->from('uem.assane@gmail.com', 'Assane Combo');
      });

      echo "Basic HTML e-mail was sent successful";
    }

    public function attachment_email(){
      $data = ['name'=>'Tucha'];
      Mail::send(['text'=>'mail'], $data, function($message){
        $message->to('melo.lp4@gmail.com', 'Lucas Melo')->subject('Send e-mail fro laravel');
        $message->attach('C:\xampp\htdocs\sisup\public\ima.png');
        $message->from('uem.assane@gmail.com', 'Assane Combo');
      });

      echo "Basic e-mail was sent successful";
    }
}
