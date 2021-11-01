<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
      protected $table = "agendamento";
      protected $fillable = ['agendamento_id'];

      //public function aula(){
        //    return $this->belongsTo("App\Aula");
     // }
}
