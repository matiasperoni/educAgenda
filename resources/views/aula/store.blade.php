@extends('layouts.app') @section('content') @include('layouts.headers.cards')


<div class="container-fluid mt--9">
    <h1>Título</h1>
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <form method="post" action="{{route('aula.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="professor_id">Professor</label>
                            <select class="form-control" name="professor_id" id="professor_id">
                                <option value="">Selecione</option>
                                    @foreach($professores as $professor)
                                        <option value="{{$professor->id}}">{{$professor->nome}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="materia_id">Matéria</label>
                            <select class="form-control" name="materia_id" id="materia_id">
                                <option value="">Selecione</option>
                                    @foreach($materias as $materia)
                                        <option value="{{$materia->id}}">{{$materia->nome}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="horario_id">Horário</label>
                            <select class="form-control" name="horario_id" id="horario_id">
                                <option value="">Selecione</option>
                                    @foreach($horarios as $horario)
                                        <option value="{{$horario->id}}">{{$horario->horaInicio}}</option>
                                    @endforeach
                            </select>
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