@extends('home.admin')
@section('content1')
      <div class="col-md-9">
             <h1>Alocar Coordenador</h1>
             <hr>

       <form class="" action="{{route('coordenacaos.store')}}" method="post" data-parsley-validate="">
           {{ csrf_field() }}
            <div class="form-group">

              <label for="disciplina">Disciplina:</label>
              <select class="form-control" name="disciplina" required="">
                  @foreach($disciplinas as $disciplina)
                      <option value="{{$disciplina->id}}">{{$disciplina->designacao}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="curso">Curso:</label>
              <select class="form-control" name="curso" required="">
                  @foreach($cursos as $curso)
                      <option value="{{$curso->id}}">{{$curso->designacao}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="coordenador">Docente:</label>
              <select class="form-control" name="coordenador" required="">
                  @foreach($docentes as $coordenador)
                      <option value="{{$coordenador->id}}">{{$coordenador->apelido .", ".$coordenador->nome}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-sm-6" style="margin-top:20px">
              <label for="data_inicio">Data Início:</label>
              <input type="date" class="form-control" name="data_inicio" value="">
            </div>
            <div class="col-sm-6" style="margin-top:20px">
              <label for="data_fim">Data Fim:</label>
              <input name="data_fim" class="form-control" type="date"/>
          </div>

          <div class="col-sm-6" style="margin-top:20px">
            {!! Html::linkRoute('coordenacaos.show', 'Cancel', array($coordenador->id), array('class' =>'btn btn-danger btn-block' ))!!}
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
