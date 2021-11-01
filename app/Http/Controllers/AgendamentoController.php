<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\Aula;
use Illuminate\Http\Request;
use App\Http\Requests\AgendamentoRequest;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return view('agendamento.index' , ['agendamentos' => $agendamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $aulas = Aulas::all();
         return view('aula.store' , ['aulas' => $aulas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendamentoRequest $request)
    {
        $novo_agendamento = $request->all();
        Agendamento::create($$novo_agendamento);
        return redirect('agendamento');
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
       $aulas = Aulas::all();
       $agendamento = Agendamento::find($id);
       return view('agendamento.edit' , compact('agendamento') , ['agendamentos' => $agendamentos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendamentoRequest $request, $id)
    {
        Agendamento::find($id)->update($request->all());
		return redirect()->route('agendamento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agendamento::find($id)->delete();
        return redirect('agendamento');
    }
}
