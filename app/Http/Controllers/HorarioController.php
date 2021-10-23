<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;
use App\Http\Requests\HorarioRequest;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $horarios = Horario::where('data','like',"%$request->search%")->orderBy('data')->paginate(5);
        }else{
            $horarios = Horario::orderBy('data')->paginate(5);
        }
        
        return view('horario.index' , ['horarios' => $horarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('horario.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HorarioRequest $request)
    {
        $novo_horario = $request->all();
        Horario::create($novo_horario);
        return redirect('horario');
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
       $horario = Horario::find($id);
       return view('horario.edit' , compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HorarioRequest $request, $id)
    {
        Horario::find($id)->update($request->all());
		return redirect()->route('horario.index');
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
        Horario::find($id)->delete();
        return redirect('horario');
        } catch (\PDOException $e) {
            return redirect('horario')->withErrors('Horario está relacionada a uma aula');
        }
    }
}
