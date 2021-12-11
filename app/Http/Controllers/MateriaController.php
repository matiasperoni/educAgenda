<?php

namespace App\Http\Controllers;

use App\Materia;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\MateriaRequest;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->search) {
        //     $materias = Materia::where('nome','like',"%$request->search%")->orderBy('nome')->paginate(5);
        // }else{
        //     $materias = Materia::orderBy('nome')->paginate(3);
        // }

        $materias = DB::table('materia')
            ->join('categoria', 'materia.categoria_id', '=', 'categoria.id')
            ->select('categoria.nome AS nome_categoria', 'materia.*')
            ->paginate(5);
        
        return view('materia.index' , ['materias' => $materias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categorias = Categoria::all();
         return view('materia.store' , ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaRequest $request)
    {
        $nova_materia = $request->all();
        Materia::create($nova_materia);
        return redirect('materia');
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
       $categorias = Categoria::all();
       $materia = Materia::find($id);
       return view('materia.edit' , compact('materia') , ['categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaRequest $request, $id)
    {
        materia::find($id)->update($request->all());
		return redirect()->route('materia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materia::find($id)->delete();
        return redirect('materia');
    }
}
