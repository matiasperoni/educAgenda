<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disponibilidade extends Model
{
    protected $table = "disponibilidade";
    protected $fillable = ['horaInicio' , 'horaFim', 'data', 'aluno_id'];
}
