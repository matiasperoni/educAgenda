<?php

namespace App\Http\Controllers;

use App\Materia;
use App\Aula;
use App\Arquivo;
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
        // if ($request->search) {
        //     $aula = Aula::where('descricao','like',"%$request->search%")->orderBy('descricao')->paginate(5);
        // }else{
        //     $aula = Aula::orderBy('descricao')->paginate(5);
        // }
        $aula = Aula::orderBy('valor')->paginate(5);
        
        return view('aula.index' , ['aulas' => $aula]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $materias = Materia::all();
         return view('aula.store' , ['materias' => $materias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Aula com formulario
        $aula = Aula::create([
                            'descricao' => $request->get('descricao'),
                            'valor' => $request->get('valor')
                        ]);

        //Arquivos
        $arquivo = $request->arquivo;
        foreach($arquivo as $a => $value) {
            Arquivo::create([
                            'aula_id' => $aula->id,
                            'arquivo_id' => $arquivo[$a]
                        ]);
        }

        return redirect('produtokit');



    }


    public function edit($id)
    {
       $lista_materias = Materia::all();
       $aula = Aula::find($id);
       $materias = $aula->materias;

       return view('aula.edit' , compact('aula') , ['materias' => $materias , 'lista_materias' => $lista_materias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        aula::find($id)->update($request->all());
        
        //DELETA TODOS E INSERE NOVAMENTE
        AulaMaterias::where('aula_id', $id)->delete();
        $materias = $request->materias;
        foreach($materias as $a => $value) {
            AulaMaterias::create([
                            'aula_id' => $id,
                            'materia_id' => $materias[$a]
                        ]);
        }

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
        aula::find($id)->delete();

        return redirect('aula');
    }
}