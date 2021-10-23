<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
      protected $table = "aula";
      protected $fillable = ['aula_id'];

      public function aula(){
            return $this->belongsTo("App\Aula");
      }
}
