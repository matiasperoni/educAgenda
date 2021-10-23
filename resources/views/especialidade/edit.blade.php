@extends('layouts.app') @section('content') @include('layouts.headers.cards')


<div class="container-fluid mt--9">
    <h1>Especialidade</h1>
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <form method="post" action="{{route('especialidade.update' , ['id' => $especialidade->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da Especialidade" value="{{$especialidade->nome}}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="anoFormacao">Ano de Formação</label>
                            <input type="text" class="form-control" name="anoFormacao" id="anoFormacao" placeholder="Digite o ano de Formação" value="{{$especialidade->anoFormacao}}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="instituicao">Instituição</label>
                            <input type="text" class="form-control" name="instituicao" id="instituicao" placeholder="Digite a Instituição" value="{{$especialidade->instituicao}}" required>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Digite a Descrição" required>{{$especialidade->descricao}}</textarea>
                        </div>
                    </div>
                </div>
        </div>
        <a href="{{route('especialidade.index')}}">
            <button type="button" class="btn btn-secondary">Voltar</button>
        </a>
        <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
@include('layouts.footers.auth')
</div>

@endsection