@extends('home.admin')
@section('content1')
      <div class="col-md-7">
          <h1>Temas</h1>
      </div>
       <div class='col-md-2'>
        <a href="{{route('temas.create')}}" class=" btn btn-primary btn-lg btn-block btn-h1-spacing glyphicon glyphicon-plus">Tema</a>
       </div>
       <div class ="col-md-9">
        <hr>
       </div>
         <div class="col-md-9">
           <table class="table table-striped">
              <tr>
                 <th>Tema</th>
                 <th>Referência</th>
                 <th>Disciplina</th>
                 <th>Instituição</th>
              </tr>
              @foreach($temas as $tema)
              <tr>
                <td>{{substr($tema->designacao,0, 10)}}{{strlen($tema->descricao)>10 ? "..." : ""}}</td>
                <td>{{$tema->referencia}}</td>
                <td>{{$tema->disciplina->designacao}}</td>
                <td>{{($tema->instituicao)}}</td>
                <td>
                  <a href="{{route('temas.show', $tema->id)}}", class="btn btn-primary glyphicon glyphicon-zoom-in"></a>
                  <a href="{{route('temas.edit', $tema->id)}}", class="btn btn-primary glyphicon glyphicon-pencil"></a>
                  <a href="{{route('supervisaos.create', $tema->id)}}", class="btn btn-primary glyphicon glyphicon-education"></a>
                </td>
                </tr>
                  @endforeach
            </table>
            <div class="text-center">
              {!! $temas->links()!!} <!--Pagination-->
            </div>
         </div>


@stop
