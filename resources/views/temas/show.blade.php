@extends('home.admin')
@section('content1')
     	<div class="col-md-7">
	      <h1>Tema Interno</h1>
          <hr>
    <table class="table table-striped">
       <tr>
          <th>Tema</th>
          <th>Descrição</th>
          <th>Referência</th>
          <th>Disciplina</th>
       </tr>
       <tr>
         <td>{{$tema->designacao}}</td>
         <td>{{substr($tema->descricao,0, 15)}}{{strlen($tema->descricao)>15 ? "..." : ""}}</td>
         <td>{{$tema->referencia}}</td>
         <td>{{$tema->disciplina->designacao}}</td>
       </tr>
     </table>
	    </div>
	    <div class="col-md-4">
            <div class="well">
            	<dl class="dl-horizontal">
                   <dt>Criado aos: </dt>
                   <dd>{{date('d M, Y; H:i',strtotime ($tema->created_at))}}</dd>
            	</dl>

            	<dl class="dl-horizontal">
                   <dt>Última actualização: </dt>
                   <dd>{{date('d M, Y; H:i',strtotime ($tema->updated_at))}}</dd>
            	</dl>
            	<hr>
            	<div class="row">
                    <div class="col-sm-6">
                    	{!! Html::linkRoute('temas.edit', 'Editar', array($tema->id), array('class' =>'btn btn-primary btn-block glyphicon glyphicon-pencil'))!!}

                    </div>
                    <div class="col-sm-6">
                      {!! Form::open(['route'=>['temas.destroy', $tema->id], 'method'=>'DELETE'])!!}
                        {{ Form::submit('Apagar', array('class'=>'btn btn-danger btn-block'))}}
                      {!!Form::close()!!}
                    </div>
            	</div>
            </div>
     </div>

@endsection
