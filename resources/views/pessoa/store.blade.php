@extends('layouts.app') @section('content') @include('layouts.headers.cards')


<div class="container-fluid mt--9">
    <h1>Pessoa</h1>
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <form method="post" action="{{route('pessoa.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o Título" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="especialidade_id">Especialidade</label>
                            <select class="form-control" name="especialidade_id" id="especialidade_id">
                                    @foreach($especialidades as $especialidade)
                                        <option {{$especialidade->id == $pessoa->especialidade_id ? 'selected' : ''}} value="{{$especialidade->id}}">{{$especialidade->nome}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="cpf/cnpj">CPF/CNPJ</label>
                            <input type="text" class="form-control" name="cpf/cnpj" id="cpf/cnpj" placeholder="Digite o cpf/cnpj" value="{{$pessoa->pessoa}}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite o endereço" value="{{$pessoa->pessoa}}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite o bairro" value="{{$pessoa->pessoa}}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite a cidade" value="{{$pessoa->pessoa}}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="professor">Professor</label>
                            <input type="text" class="form-control" name="professor" id="professor" placeholder="Digite o professor" value="{{$pessoa->pessoa}}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Digite o email" value="{{$pessoa->pessoa}}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a senha" value="{{$pessoa->pessoa}}" required>
                        </div>
                    </div>
                </div>
                <a href="{{route('pessoa.index')}}">
                    <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>

@endsection