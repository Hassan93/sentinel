@extends('home.admin')
@section('content1')
       <div class="col-md-6">
          <h1>Coordenadores</h1>
       </div>
       <div class='col-md-3'>
        <a href="{{route('coordenacaos.create')}}" class=" btn btn-primary btn-lg btn-block btn-h1-spacing glyphicon glyphicon-plus">Coordenador</a>
       </div>
       <div class ="col-md-9">
      <hr>
       </div>
     <div class="col-md-9">
        <table class="table table-striped">
       <tr>
          <th>Disciplina</th>
          <th>Curso</th>
          <th>Coordenador</th>
       </tr>
       @foreach($coordenacoes as $coordenacao)
       <tr>
         <td>{{$coordenacao->disciplina->designacao}}</td>
         <td>{{$coordenacao->curso->designacao}}</td>
         <td>{{$coordenacao->docente->nome ." ".$coordenacao->docente->apelido}}</td>
       </tr>
       @endforeach
    </table>
        <div class="text-center">
          {!! $coordenacoes->links()!!} <!--Pagination-->
        </div>
     </div>
@stop
