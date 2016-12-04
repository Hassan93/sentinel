<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tema;
use App\Docente;
use App\Supervisao;
use App\Coordenacao;
use App\Estudante;
use Sentinel;

class SupervisaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisaos = Supervisao::OrderBy('id','desc')->paginate(4);
        return view('supervisaos.index')->withSupervisaos($supervisaos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temas = Tema::all();
        $docentes = Docente::all();
        $estudantes = Estudante::all();
        $coordenacaos = Coordenacao::OrderBy('id','desc')->take(4);
        return view('supervisaos.create')->withEstudantes($estudantes)->withTemas($temas)->withDocentes($docentes)->withCoordenacaos($coordenacaos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $supervisao = new Supervisao;
        $supervisao->data_inicio = $request->data_inicio;
        $supervisao->data_fim = $request->data_fim;
        $supervisao->tema_id = $request->tema;
        $supervisao->supervisor_id= $request->supervisor;
        $supervisao->estudante_id = $request->estudante;
        $supervisao->save();

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
}
