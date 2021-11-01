<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Especialidade extends Model
{
    protected $table = "especialidade";
    protected $fillable = ['nome' ,'anoFormacao' , 'instituicao' , 'descricao'];
}
