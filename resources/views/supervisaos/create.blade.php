@extends('home.admin')
@section('content1')
  <div class="col-md-9">
         <h1>Alocar estudante ao tema</h1>
         <hr>

         <form class="" action="{{route('supervisaos.store')}}" method="post" data-parsley-validate="">
             {{ csrf_field() }}
              <div class="form-group">
                <label for="tema">Tema:</label>
                <select class="form-control" name="tema" required="">
                     @foreach ($temas as $tema)
                         <option value="{{$tema->id}}">{{$tema->designacao}}</option>
                     @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="supervisor">Supervisor:</label>
                <select class="form-control" name="supervisor" required="">
                  @foreach ($docentes as $docente)
                      <option value="{{$docente->id}}">{{$docente->apelido .', '. $docente->nome}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="estudante">Estudante:</label>
                <select class="form-control" name="estudante" required="">
                  @foreach ($estudantes as $estudante)
                      <option value="{{$estudante->id}}">{{$estudante->apelido .', '. $estudante->nome}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-6" style="margin-top:20px">
                <label for="data_inicio">Entrega do tema:</label>
                <input type="date" class="form-control" name="data_inicio" value="">
              </div>
              <div class="col-sm-6" style="margin-top:20px">
                <label for="data_fim">Previsão de conclusão:</label>
                <input name="data_fim" class="form-control" type="date"/>
              </div>

              <div class="col-sm-6" style="margin-top:20px">
              {!! Html::linkRoute('supervisaos.index', 'Cancel', array(''), array('class' =>'btn btn-danger btn-block' ))!!}
              </div>
              <div class="col-sm-6" style="margin-top:20px">
              {{ Form::submit('Gravar', array('class'=>'btn btn-success btn-block'))}}
              </div>
         </form>
</div>
@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js')!!}
@endsection
