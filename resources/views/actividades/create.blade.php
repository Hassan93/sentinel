@extends('home.studant')
@section('content2')
      <div class="col-md-9">
             <h1>Cronograma de actividades</h1>
             <hr>

       <form class="" action="{{url('/studant'.'/'.$estudante->id.'/actividades'.'/'.$supervisao->id.'/nova')}}" method="post" data-parsley-validate="">
           {{ csrf_field() }}
           <div class="form-group">
             <label for="actividade">Actividade:</label>
             <input type="text" class="form-control" name="actividade" placeholder="Designação da actividade" required="">
           </div>
           <div class="form-group">
             <label for="descricao">Descrição da actividade:</label>
             <textarea name="descricao" class ="form-control" placeholder="Descrição sumária do tema" required=""></textarea>
           </div>
           <div class="form-group">
             <label for="resultado">Resultado esperado:</label>
             <input type="text" class="form-control" name="resultado" placeholder="Resultado esperado" required="">
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
            {!! Html::linkRoute('coordenacaos.show', 'Cancel', [' '], array('class' =>'btn btn-danger btn-block' ))!!}
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
