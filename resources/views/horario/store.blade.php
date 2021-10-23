@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')


 <div class="container-fluid mt--9">
     <h1>Horario</h1>
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
                            <label for="horaInicio">Hora Início</label>
                            <input type="time" class="form-control" name="horaInicio" id="horaInicio" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="horaFim">Hora Fim</label>
                            <input type="time" class="form-control" name="horaFim" id="horaFim" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="data">Data</label>
                            <input type="date" class="form-control" name="data" id="data" required>
                        </div>
                    </div>
                    
                </div>
        @include('layouts.footers.auth')
    </div>

@endsection

