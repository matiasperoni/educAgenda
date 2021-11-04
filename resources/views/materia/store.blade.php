@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')


<div class="container-fluid mt--9">
    <h1>Disciplina</h1>
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <form method="post" action="{{route('materia.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    {!! Form::label('id_disciplina', 'Escolha Uma Disciplina Para Dar Aula:') !!}
                    {!! Form::select('id_disciplina',
                    \App\Disciplina::orderby('nome')->pluck('nome', 'id_disciplina')->toArray(),
                    null, ['class'=>'form-control', 'required']) !!}

                </div>
        </div>
    </div>
        <a href="{{route('materia.index')}}">
            <button type="button" class="btn btn-secondary">Voltar</button>
        </a>
        <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    
    @include('layouts.footers.auth')
</div>

</div>

@endsection