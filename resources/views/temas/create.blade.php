@extends('home.admin')
@section('content1')
      <div class="col-md-9">
             <h1>Registar  Temas</h1>
             <hr>

       <form class="" action="{{route('temas.store')}}" method="post"  data-parsley-validate="">
           {{ csrf_field() }}
            <div class="form-group" id="form_1">
              <label for="disciplina">Disciplina:</label>
              <select class="form-control" name = "disciplina" id="disciplina" placeholder="Designação do tema" required="" onchange="myFunction()">
                  @foreach($disciplinas as $disciplina)
                      <option value="{{$disciplina->id}}">{{$disciplina->designacao}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="curso">Curso:</label>
              <select class="form-control" name = "curso" id="curso" placeholder="Escolha o curso" required="">
                  @foreach($cursos as $curso)
                      <option value="{{$curso->id}}">{{$curso->designacao}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="designacao">Tema:</label>
              <input type="text" class="form-control" name="designacao" placeholder="Designação do tema" required="">
            </div>
            <div class="form-group">
              <label for="referencia">Referência do tema:</label>
              <input type="text" class="form-control" name="referencia" placeholder="Designação do tema" required="">
            </div>
            <div class="form-group">
              <label for="descricao">Descrição do tema:</label>
              <textarea name="descricao" class ="form-control" placeholder="Descrição sumária do tema" required=""></textarea>
            </div>
          <div class="col-sm-6" style="margin-top:20px">
            {!! Html::linkRoute('temas.index', 'Cancel', [''], array('class' =>'btn btn-danger btn-block' ))!!}
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

<script type="text/javascript">
function myFunction() {
    var disciplin = document.getElementById("disciplina");
    if (disciplin.value == 2) {
      $('#myModal').modal();
    };

}
</script>

<script type="text/javascript">
function displayDivInst() {

  var elem = document.getElementById("instituicao_nova");
             document.getElementById("instituicao").disabled=true;
             document.getElementById("supervisor").disabled=true;
    $(elem).show();
}
</script>

<script type="text/javascript">
function displayDivSuper() {

  var elem = document.getElementById("supervisor_novo");
  document.getElementById("supervisor").disabled=true;
   $(elem).show();
}
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title">Adicionar Instituição</h4></center>
      </div>
      <div class="modal-body">
        <form class="" action="{{url('/')}}" method="post">
          <div class = "row">
            <div class="col-md-8">
              <label for="instituicao">Instituiçao:</label>
            </div>
                <div class="col-md-6" style="margin-top:2px">
                  <select class="form-control" id = "instituicao" name="instituicao" placeholder ="Escolha a instituição">
                    @foreach($instituicaos as $instituicao)
                        <option value="{{$instituicao->id}}">{{$instituicao->designacao}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2" style="margin-top:2px">
                  <button type="button" class="btn btn-default glyphicon glyphicon-plus" onclick="displayDivInst()"></button>
                </div>
              <div class="col-md-8" id ="instituicao_nova" hidden>
                <div class="form-group">
                  <label for="desig" class="form-spacing-top">Nome:</label>
                  <input type="text" name="desig" class="form-control" >
                </div>
                  <div class="form-group">
                    <label for="actividade" class="form-spacing-top">Área de actividades:</label>
                    <input type="text" name="actividade" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="cidade" class="form-spacing-top">Cidade:</label>
                    <input type="text" name="cidade" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-spacing-top">E-mail da instituição:</label>
                    <input type="email" name="email" class="form-control">
                  </div>
              </div>
            </div>
              <div class = "row">
              <div class="col-md-8">
                <label for="supervisor">Supervisor da instituiçao:</label>
              </div>
                  <div class="col-md-6" style="margin-top:2px">
                    <select class="form-control" name="supervisor" id ="supervisor">
                      <option value="">Escolha supervisor</option>
                    </select>
                  </div>
                  <div class="col-md-2" style="margin-top:2px">
                    <button type="button" class="btn btn-default glyphicon glyphicon-plus" onclick="displayDivSuper()"></button>
                  </div>
                  <div id ="supervisor_novo" hidden>
                     <p>kdkdk</p>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-6" style="margin-top:20px">
                   <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Fechar</button>
                </div>
                <div class="col-sm-6" style="margin-top:20px">
                   <button type="submit" class="btn btn-success btn-block" data-toggle="modal">Salvar</button>
                </div>
              </div>
        </form>

        </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
