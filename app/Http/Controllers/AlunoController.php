<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;

class AlunoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('aluno.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        $novo_aluno = $request->all();
        Aluno::create($novo_aluno);
        return redirect('aluno');
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
       $aluno = Aluno::find($id);
       return view('aluno.edit' , compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlunoRequest $request, $id)
    {
        Divisao::find($id)->update($request->all());
		return redirect()->route('aluno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Aluno::find($id)->delete();
             return redirect('aluno');
        } catch (\PDOException $e) {
            return redirect('aluno')->withErrors('Aluno está relacionada a um produto');
        }
    }
}
