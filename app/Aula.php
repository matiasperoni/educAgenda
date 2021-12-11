<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
      protected $table = "aula";
      protected $fillable = ['descricao' ,'valor', 'materia_id'];

      public function arquivos()
        {
            return $this->hasMany("App\Arquivo");
        }
        public function materia(){
          return $this->belongsTo("App\Materia");
    }
}
