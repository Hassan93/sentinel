@extends('home.studant')
@section('content2')
       <div class="col-md-6">
          <h1>Actividades</h1>
       </div>
       <div class='col-md-3'>
        <a href="{{url('/studant'.'/'.$estudante->id.'/actividades'.'/'.$supervisao->id.'/nova')}}" class=" btn btn-primary btn-lg btn-block btn-h1-spacing glyphicon glyphicon-plus">Actividade</a>
       </div>
       <div class ="col-md-9">
      <hr>
       </div>
     <div class="col-md-9">
        <table class="table table-striped">
       <tr>
          <th>Actividade</th>
          <th>Descricão</th>
          <th>Resultado</th>
          <th>Duracão</th>
       </tr>
         @foreach($actividades as $actividade)
           <tr>
             <th>{{$actividade->ctividade}}</th>
             <th>{{substr($actividade->descricao,0, 10)}}{{strlen($actividade->descricao)>10 ? "..." : ""}}</th>
             <th>{{substr($actividade->resultado,0, 10)}}{{strlen($actividade->resultado)>10 ? "..." : ""}}</th>
             <th>{{$actividade->data_inicio->diff($actividade->data_fim)->format('%R%a dias')}}</th>

           </tr>
         @endforeach
    </table>
     </div>
@stop
