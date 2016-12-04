<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividade;
use App\Supervisao;
use App\Estudante;
class ActividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $idsupervisao)
    {
      $estudante = Estudante::find($id);
      $supervisao=Supervisao::find($idsupervisao);

        return view('actividades.create')->withEstudante($estudante)->withSupervisao($supervisao);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $estudante_id, $supervisao_id)
    {
        $estudante = Estudante::find($estudante_id);
        $supervisao = Supervisao::find($supervisao_id);
        $actividade = new Actividade;
        $actividade->actividade = $request->actividade;
        $actividade->descricao = $request->descricao;
        $actividade->resultado = $request->resultado;
        $actividade->data_inicio = $request->data_inicio;
        $actividade->data_fim = $request->data_fim;
        $actividade->supervisao_id = $supervisao->id;
        $actividade->save();
          return redirect('/studant'.'/'.  $estudante->id.'/actividades'.'/'.$supervisao->id)->withEstudante($estudante)->withSupervisao($supervisao);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function minhas($id)
    {
         $supervisaos = Supervisao::all();
         foreach ($supervisaos as $supervisao) {
          if ($supervisao->estudante_id = $id){
            $estudante = Estudante::find($id);
            $actividades= Actividade::where('supervisao_id','=', $supervisao->id)->get();
            return redirect('/studant'.'/'.$id.'/actividades'.'/'.$supervisao->id)->withActividades($actividades)->withSupervisao($supervisao);
          }
         }
    }
    public function getActividades($id,$supervisao_id)
    {
      $estudante = Estudante::find($id);
      $supervisao=Supervisao::find($supervisao_id);
      $actividades= Actividade::where('supervisao_id','=', $supervisao->id)->get();
      return view('actividades.index')->withActividades($actividades)->withEstudante($estudante)->withSupervisao($supervisao);
    }
}
