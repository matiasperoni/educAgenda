<?php

namespace App\Http\Controllers;

use App\Arquivo;
use Illuminate\Http\Request;
use App\Http\Requests\ArquivoRequest;

class ArquivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $arquivos = Arquivo::where('nome','like',"%$request->search%")->orderBy('nome')->paginate(5);
        }else{
            $arquivos = Arquivo::orderBy('nome')->paginate(5);
        }
        
        return view('arquivo.index' , ['arquivos' => $arquivos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('arquivo.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(arquivoRequest $request)
    {
        $nova_arquivo = $request->all();
        Arquivo::create($nova_arquivo);
        return redirect('arquivo');
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
       $arquivo = Arquivo::find($id);
       return view('arquivo.edit' , compact('arquivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArquivoRequest $request, $id)
    {
        Arquivo::find($id)->update($request->all());
		return redirect()->route('arquivo.index');
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
        Arquivo::find($id)->delete();
        return redirect('arquivo');
        } catch (\PDOException $e) {
            return redirect('arquivo')->withErrors('Arquivo está relacionada a uma Aula');
        }
    }
}
