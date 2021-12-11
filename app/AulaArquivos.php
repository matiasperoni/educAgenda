<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AulaArquivos extends Model
{
    protected $table = "aula_arquivos";
    protected $fillable = ['aula_id', 'arquivo_id'];

	
}
