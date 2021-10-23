@extends('layouts.app') @section('content') @include('layouts.headers.cards')


<div class="container-fluid mt--9">
    <h1>Agendamento</h1>
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <form method="post" action="{{route('agendamento.update' , ['id' => $agendamento->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="aula_id">Aula</label>
                            <select class="form-control" name="aula_id" id="aula_id">
                                    @foreach($aulas as $aula)
                                        <option {{$aula->id == $agendamento->aula_id ? 'selected' : ''}} value="{{$aula->id}}">{{$aula->materia}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    
                </div>
        </div>
        <a href="{{route('agendamento.index')}}">
            <button type="button" class="btn btn-secondary">Voltar</button>
        </a>
        <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
@include('layouts.footers.auth')
</div>

@endsection