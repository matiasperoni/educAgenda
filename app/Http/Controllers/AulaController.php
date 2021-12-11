<?php

namespace App\Http\Controllers;

use App\Arquivo;
use App\Materia;
use App\Aula;
use App\AulaArquivos;
use Illuminate\Http\Request;
use App\Http\Requests\AulaRequest;
use App\Http\Requests\ArquivoRequest;
use Illuminate\Support\Facades\DB;

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
        //     $aulas = Aula::where('nome','like',"%$request->search%")->orderBy('nome')->paginate(5);
        // }else{
        //     $aulas = Aula::orderBy('valor')->paginate(5);
        // }

        $aulas = DB::table('aula')
            ->join('materia', 'aula.materia_id', '=', 'materia.id')
            ->select('materia.nome AS nome_materia', 'aula.*')
            ->paginate(3);
        
        return view('aula.index' , ['aulas' => $aulas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $arquivos = Arquivo::all();

         $materias = Materia::all();
         return view('aula.store' , ['materias' => $materias], ['arquivos' => $arquivos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $aula = Aula::create([
                            'descricao' => $request->get('descricao'),
                            'materia_id' => $request->get('materia_id'),
                            'valor' => $request->get('valor')
                        ]);

        $arquivos = $request->arquivos;
        foreach($arquivos as $a => $value) {
            AulaArquivos::create([
                            'aula_id' => $aula->id,
                            'arquivo_id' => $arquivos[$a]
                        ]);
        }

        return redirect('aula');


    }


    public function edit($id)
    {
       $lista_arquivos = Arquivo::all();
       $arquivo = Aula::find($id);
       $arquivos = $aula->arquivos;

       return view('aula.edit' , compact('arquivo') , ['arquivos' => $arquivos , 'lista_arquivos' => $lista_arquivos]);
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
        Aula::find($id)->update($request->all());
        
        //DELETA TODOS E INSERE NOVAMENTE
        Aulaarquivos::where('aula_id', $id)->delete();
        $arquivos = $request->arquivos;
        foreach($arquivos as $a => $value) {
            AulaArquivos::create([
                            'aula_id' => $id,
                            'arquivo_id' => $arquivos[$a]
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
        Aula::find($id)->delete();

        return redirect('aula');
    }
}
