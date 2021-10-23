@extends('layouts.app') @section('content') @include('layouts.headers.cards')


<div class="container-fluid mt--9">
    <h1>Aula</h1>
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
                            <label for="categoria_id">Professor</label>
                            <select class="form-control" name="professor_id" id="professor_id">
                                    @foreach($professor as $professor)
                                        <option {{$professor->id == $aula->professor_id ? 'selected' : ''}} value="{{$professor->id}}">{{$professor->nome}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="materia_id">Matéria</label>
                            <select class="form-control" name="materia_id" id="materia_id">
                                    @foreach($materia as $materia)
                                        <option {{$materia->id == $aula->materia_id ? 'selected' : ''}} value="{{$materia->id}}">{{$materia->nome}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="horario_id">Horário</label>
                            <select class="form-control" name="horario_id" id="horario_id">
                                    @foreach($horario as $horario)
                                        <option {{$horario->id == $aula->horario_id ? 'selected' : ''}} value="{{$horario->id}}">{{$horario->horaInicio}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="w-100"></div>
                    <div class="col">
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