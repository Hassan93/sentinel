<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Disciplina;
use App\Tema;
use App\Curso;
use App\Instituicao;
use App\Instituicao_Tema;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temas = Tema::orderBy('id', 'desc')->paginate(3);

        return view('temas.index')->withTemas($temas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos  = Curso::all();
        $disciplinas = Disciplina::all();
        $instituicaos= Instituicao::all();
        return view('temas.create')->withCursos($cursos)->withDisciplinas($disciplinas)->withInstituicaos($instituicaos);
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
               'designacao'  => 'required|max:200',
               'referencia'  => 'required|max:20',
               'descricao' => 'required',
               'actividade' => '',
               'cidade' =>'',
               'email' => ''

        ));
          //  $instituicao =Instituicao::find(1)->get();
            $tema = new Tema;
            $tema->referencia = $request->referencia;
            $tema->designacao = $request->designacao;
            $tema->descricao = $request->descricao;
            $tema->status    = 'Activo';
            $tema->curso_id = $request->curso;
            $tema->disciplina_id = $request->disciplina;
            $tema->save();
          if ($request->instituicao =="") {
            $instituicao_tema = new Instituicao_Tema;
            $instituicao_tema->instituicao_id = 1;
            $instituicao_tema->tema_id = $tema->id;
            $instituicao_tema->tema_status =$tema->status;
            $instituicao_tema->save();
          }

    //
    // if($request->disciplina ==2 && $request->instituicao !=""){
    //         $instituicao_tema = new Instituicao_Tema;
    //         $instituicao_tema->instituicao_id = $request->instituicao;
    //         $instituicao_tema->tema_id = $tema->id;
    //         $instituicao_tema->tema_status =$tema->status;
    //         $instituicao_tema->save();
    //       }else{
    //         $instituicao_tema = new Instituicao_Tema;
    //         $instituicao = new Instituicao;
    //         $instituicao->designacao = $request->desig;
    //         $instituicao->cidade = $request->cidade;
    //         $instituicao->email = $request->email;
    //         $instituicao->area_de_actividade =$request->actividade;
    //         $instituicao->save();
    //
    //         $instituicao_tema->instituicao_id = $request->instituicao->id;
    //         $instituicao_tema->tema_id = $tema->id;
    //         $instituicao_tema->tema_status =$tema->status;
    //
    //         $instituicao_tema->save();
    //        }
    $temas = Tema::orderBy('id', 'desc')->paginate(4);
return redirect()->route('temas.index')->withTemas($temas);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tema = Tema::find($id);

        if ($tema->disciplina_id !=2) {

           return view('temas.show')->withTema($tema);
        }
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
