@extends('home.admin')
@section('content1')
      <div class="col-md-7">
          <h1>Supervisão</h1>
      </div>
       <div class='col-md-3'>
        <a href="{{route('supervisaos.create')}}" class=" btn btn-primary btn-lg btn-block btn-h1-spacing glyphicon glyphicon-plus">Supervisor</a>
       </div>
       <div class ="col-md-9">
        <hr>
       </div>
         <div class="col-md-10">
           <table class="table table-striped">
              <tr>
                 <th>Supervisando</th>
                 <th>Supervisores</th>
                 <th>Tema</th>
                 <th>Progresso do trabalho (%)</th>
              </tr>
              @foreach($supervisaos as $supervisao)
              <tr>
                <td>{{$supervisao->estudante->apelido .' ,'. $supervisao->estudante->nome}}</td>
                <td>{{$supervisao->docente->nome .' '.$supervisao->docente->apelido}}</td>
                <td>{{substr($supervisao->tema->designacao,0, 10)}}{{strlen($supervisao->tema->designacao)>10 ? "..." : ""}}</td>
                <td>
                 <div class="progress">
                     <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                       70%
                     </div>
                   </div>
                  </td>
                <td>
                  <a href="{{route('supervisaos.show', $supervisao->id)}}", class="btn btn-primary glyphicon glyphicon-zoom-in"></a>
                  <a href="{{route('supervisaos.edit', $supervisao->id)}}", class="btn btn-primary glyphicon glyphicon-pencil"></a>
                </td>
                </tr>
                  @endforeach
            </table>
            <div class="text-center">
              {!! $supervisaos->links()!!} <!--Pagination-->
            </div>
         </div>


@stop
