@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')




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
                    <div class="col">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da Especialidade" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="anoFormacao">Ano de Formação</label>
                            <input type="text" class="form-control" name="anoFormacao" id="anoFormacao" placeholder="Digite o ano de Formação"  required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="instituicao">Instituição</label>
                            <input type="text" class="form-control" name="instituicao" id="instituicao" placeholder="Digite a Instituição"  required>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Digite a Descrição" required></textarea>
                        </div>
                    </div>
                </div>
        @include('layouts.footers.auth')
    </div>

@endsection
