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
            <form method="post" action="{{route('agendamento.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="aula_id">Aula</label>
                            <select class="form-control" name="aula_id" id="agendamento_id">
                                <option value="">Selecione</option>
                                    @foreach($agendamentos as $agendamento)
                                        <option value="{{$aula->id}}">{{$aula->horaInicio}}</option>
                                    @endforeach
                            </select>
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