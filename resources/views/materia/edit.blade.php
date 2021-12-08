@extends('layouts.app') @section('content') @include('layouts.headers.cards')


<div class="container-fluid mt--9">
    <h1>Notícia</h1>
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <form method="post" action="{{route('materia.update' , ['id' => $materia->id])}}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="categoria_id">Categoria</label>
                            <select class="form-control" name="categoria_id" id="categoria_id">
                                @foreach($categorias as $categoria)
                                <option {{$categoria->id == $materia->categoria_id ? 'selected' : ''}}
                                    value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome"
                                value="{{$materia->nome}}" required>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3"
                                placeholder="Digite a Descrição" required>{{$materia->descricao}}</textarea>
                        </div>
                    </div>
                </div>
        </div>
        <a href="{{route('materia.index')}}">
            <button type="button" class="btn btn-secondary">Voltar</button>
        </a>
        <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
@include('layouts.footers.auth')
</div>

@endsection