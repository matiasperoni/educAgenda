<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aluno extends Model
{
    protected $table = "aluno";
    protected $fillable = ['nome' , 'idade', 'formacao', 'enereco', 'bairro', 'cidade'];

    public function aluno(){
        return $this->belongsTo("App\Aluno");
  }

}
