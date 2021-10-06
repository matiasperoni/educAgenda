@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

    <div class="container-fluid mt--9">
          
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="mb-3 bg-white" style="border:2px solid #fff;padding:10px;border-radius:10px;border: 1px solid #ededed;display:flex;align-items: center ">
      <a href="{{ route('materia.create') }}">
        <button class="btn btn-icon btn-success" type="button">
          <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
            <span class="btn-inner--text">Novo</span>
        </button>
      </a>
      <form id="form-search" action="{{ route('materia.index') }}" class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i onclick="$('#form-search').submit()" class="fas fa-search" style="color:#5e72e4;cursor:pointer"></i></span>
                    </div>
                    <input class="form-control" name="search" placeholder="Search" type="text" style="color:#5e72e4">
                </div>
            </div>
        </form>
    </div>

        <div class="row">
            <div class="col-xl-12">
              <div class="table-responsive">
               <table class="table table-hover table-striped align-items-center ">
                    <thead>
                        <tr>
                        <th scope="col">Ações</th>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($materias as $materia)
                        <tr>
                            <td style="padding: 10px;width: 50px">
                              <a href="{{ route('materia.edit' , ['id' => $materia->id]) }}" >
                                <button class="btn btn-sm btn-icon btn-3 btn-primary" type="button" style="width: 30px;cursor:pointer">
                                    <span class="btn-inner--icon"><i class="ni ni-archive-2 text-white"></i></span>
                                </button>
                               </a>
                                <a href="{{ route('materia.destroy' , ['id' => $materia->id]) }}" >
                                    <button class="btn btn-sm btn-icon btn-3 btn-danger" type="button" style="width: 30px"  >
                                        <span class="btn-inner--icon"><i class="ni ni-fat-remove text-white"></i></span>
                                    </button>
                                </a>
                            </td>
                            <th scope="row" style="width: 100px">{{$materia->id}}</th>
                            <td>{{$materia->nome}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                   {{ $materias->links() }}
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection


@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush