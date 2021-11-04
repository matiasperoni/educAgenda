<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function create()
{
    $disciplinas = disciplinas::all(['id', 'nome']);

    return view('prices.create', compact('id', 'disciplinas'));
}
}
