<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
      protected $table = "pessoa";
      protected $fillable = ['nome', 'especialidade_id', 'cpf/cnpj', 'endereco', 'bairro', 'cidade', 'professor', 'email', 'senha'];

      public function especialidade(){
            return $this->belongsTo("App\Especialidade");
      }
}
