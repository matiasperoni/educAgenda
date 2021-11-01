<?php

namespace App\Http\Controllers;

use App\Especialidade;
use App\Pessoa;
use Illuminate\Http\Request;
use App\Http\Requests\PessoaRequest;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $pessoas = Pessoa::orderBy('nome')->paginate(5);
        
      return view('pessoa.index' , ['pessoas' => $pessoas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $especialidade = Especialidade::all();
         return view('especialidade.store' , ['especialidades' => $especialidades]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaRequest $request)
    {
        $nova_pessoa = $request->all();
        Pessoa::create($nova_pessoa);
        return redirect('pessoa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $especialidades = Especialidade::all();
       $pessoas = Pessoa::find($id);
       return view('pessoa.edit' , compact('pessoa') , ['especialidades' => $especialidades]);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaRequest $request, $id)
    {
        Pessoa::find($id)->update($request->all());
		return redirect()->route('pessoa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pessoa::find($id)->delete();
        return redirect('pessoa');
    }
}
