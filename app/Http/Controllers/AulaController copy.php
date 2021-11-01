<?php

namespace App\Http\Controllers;

use App\Aula;
use App\Pessoa;
use App\Materia;
use App\Horario;
use Illuminate\Http\Request;
use App\Http\Requests\AulaRequest;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $aulas = Aula::orderBy('aula_id')->paginate(5);
        
        return view('aula.index' , ['aulas' => $aulas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pessoas = Pessoa::all();
         return view('aula.store' , ['pessoas' => $pessoas]);

         $materias = Materia::all();
         return view('aula.store' , ['materias' => $materias]);

         $horarios = Horario::all();
         return view('aula.store' , ['horarios' => $horarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AulaRequest $request)
    {
        $nova_aula = $request->all();
        Aula::create($nova_aula);
        return redirect('aula');
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
       $pessoas = Pessoa::all();
       $aula = Aula::find($id);
       return view('aula.edit' , compact('aula') , ['pessoas' => $pessoas]);

       $materias = Materia::all();
       $aula = Aula::find($id);
       return view('aula.edit' , compact('aula') , ['materias' => $materias]);

       $horarios = Horario::all();
       $aula = Aula::find($id);
       return view('aula.edit' , compact('aula') , ['horarios' => $horarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AulaRequest $request, $id)
    {
        Aula::find($id)->update($request->all());
		return redirect()->route('aula.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aula::find($id)->delete();
        return redirect('aula');
    }
}
