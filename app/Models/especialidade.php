<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class especialidade extends Model
{
    protected $table = "especialidade";
    protected $fillable = ['formacao' , 'anoFormacao', 'instituicao', 'descricao'];

}
