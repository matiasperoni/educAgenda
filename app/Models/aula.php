<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aula extends Model
{
    protected $table = "aula";
    protected $fillable = ['horaInicio' , 'horaFim', 'data', 'aluno_id', 'status', 'aluno_id', 'professor_id'];
}
