<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Curso;
use App\Disciplina;
use App\Docente;
use App\Coordenacao;
use MailController;
class CoordenacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordenacoes = Coordenacao::orderBy('id', 'desc')->paginate(4);

       return view('coordenacaos.index')->withCoordenacoes($coordenacoes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $cursos = Curso::all();
         $disciplinas = Disciplina::all();
         $docentes = Docente::all();

         return view('coordenacaos.create')->withCursos($cursos)->withDisciplinas($disciplinas)
                                           ->withDocentes($docentes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         $this->validate($request, array(
               'disciplina' => 'required|numeric',
               'curso'  => 'required|numeric',
               'coordenador'  => 'required|numeric',
               'data_inicio' => 'required',
               'data_fim' => 'required'
        ));

        $coordenacao = new Coordenacao;

        $coordenacao->data_inicio = $request->data_inicio;
        $coordenacao->data_fim = $request->data_fim;
        $coordenacao->curso_id = $request->curso;
        $coordenacao->disciplina_id = $request->disciplina;
        $coordenacao->coordenador_id= $request->coordenador;

        $coordenacao->save();

          return redirect(url('/basicmail'.'/'.$coordenacao->id.'/'.$coordenacao->coordenador_id));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coordenacao = Coordenacao::find($id);

        return view('coordenacaos.show')->withCoordenacao($coordenacao);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coordenacao = Coordenacao::find($id);

        return view('coordenacaos.show')->withCoordenacao($coordenacao);
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
        $coordenacao= Coordenacao::find($id);
        $coordenacao->delete();

        $coordenacoes = Coordenacao::all();
        return redirect()->route('coordenacaos.index')->withCoordenacoes($coordenacoes);
    }
}
