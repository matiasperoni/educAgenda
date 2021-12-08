@extends('layouts.app') @section('content') @include('layouts.headers.cards')


<div class="container-fluid mt--9">
    <h1>aula</h1>
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <form method="post" action="{{route('aula.update' , ['id' => $aula->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3"
                                placeholder="Digite a Descrição" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" name="valor" id="valor" placeholder="Digite o Valor"
                                value="{{$aula->valor}}" required>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div style="margin-bottom:20px">
                            <button type="button" class="add_field_button btn btn-default">Adicionar Matérias</button>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div class="input_fields_wrap">
                            @foreach($materias as $value)
                            <div>
                                <div class="form-group">
                                    <label for="materias" style="display: block;">Materia</label>
                                    <select class="form-control" readonly name="materias[]" id="materias"
                                        style="width:400px;float:left;cursor: not-allowed;background-color: #eee;opacity: 1;pointer-events: none;">
                                        <option value="{{$value->materia->id}}">{{$value->materia->nome}}</option>
                                    </select>&nbsp;&nbsp;
                                    <button type="button"
                                        class="remove_field btn btn-danger btn-circle fa fa-times"></button>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
        </div>
        <a href="{{route('aula.index')}}">
            <button type="button" class="btn btn-secondary">Voltar</button>
        </a>
        <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
@include('layouts.footers.auth')
</div>

@endsection


@push('js')
<script>
$(document).ready(function() {

    $('#valor').mask("#,##0.00", {
        reverse: true
    });

    var wrapper = $(".input_fields_wrap");
    var add_button = $(".add_field_button");
    var x = 0;

    $(add_button).click(function(e) {
        e.preventDefault();
        x++;
        var newField = `<div><div class="form-group">
                                <label for="materias" style="display: block;">Materia</label>
                                <select class="form-control" name="materias[]" id="materias" style="width:400px;float:left">
                                    <option value="">Selecione</option>
                                        @foreach($lista_materias as $lista)
                                            <option value="{{$lista->id}}">{{$lista->nome}}</option>
                                        @endforeach
                                </select>&nbsp;&nbsp;
                                <button type="button" class="remove_field btn btn-danger btn-circle fa fa-times"></button>
                            </div></div>`;
        $(wrapper).append(newField);
    });

    $(wrapper).on("click", ".remove_field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });

})
</script>
@endpush