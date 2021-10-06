<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    protected $table = "professor";
      protected $fillable = ['nome' ,'formacao' , 'cpf/cnpj', 'descricao', 'endereco', 'bairro', 'cidade' , 'especialidade_id'];
}
