@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')


 <div class="container-fluid mt--9">
     <h1>Aluno</h1>
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
            <div class="col-xl-12">
            <form method="post" action="{{route('aluno.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome" required >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="idade">Idade</label>
                            <input type="int" class="form-control" name="idade" id="idade" placeholder="Digite sua idade" required >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formacao">Formação</label>
                            <input type="text" class="form-control" name="formacao" id="formacao" placeholder="Formação" required >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Digite o telefone" required >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite o Endereço" required >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite o bairro" required >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite a cidade" required >
                        </div>
                    </div>
                    <div class="w-100"></div>
                </div>
                <a href="{{route('aluno.index')}}">
                        <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection

