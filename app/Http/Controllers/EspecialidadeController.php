<?php

namespace App\Http\Controllers;

use App\Especialidade;
use Illuminate\Http\Request;
use App\Http\Requests\EspecialidadeRequest;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $especialidades = Especialidade::where('nome','like',"%$request->search%")->orderBy('nome')->paginate(5);
        }else{
            $especialidades = Especialidade::orderBy('nome')->paginate(5);
        }
        
        return view('especialidade.index' , ['especialidades' => $especialidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('especialidade.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadeRequest $request)
    {
        $nova_especialidade = $request->all();
        Especialidade::create($nova_especialidade);
        return redirect('especialidade');
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
       $especialidade = Especialidade::find($id);
       return view('especialidade.edit' , compact('especialidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadeRequest $request, $id)
    {
        Especialidade::find($id)->update($request->all());
		return redirect()->route('especialidade.index');
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
        Especialidade::find($id)->delete();
        return redirect('especialidade');
        } catch (\PDOException $e) {
            return redirect('especialidade')->withErrors('Especialidade está relacionada a um Professor');
        }
    }
}
