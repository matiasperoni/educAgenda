@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')


 <div class="container-fluid mt--9">
     <h1>Categoria</h1>
     @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <div class="row">
            <div class="col-xl-12">
            <form method="post" action="{{route('categoria.update' , ['id' => $categoria->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da Categoria" required value="{{$categoria->nome}}">
                        </div>
                    </div>
                </div>
                <a href="{{route('categoria.index')}}">
                        <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection

