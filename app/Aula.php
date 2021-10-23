<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
      protected $table = "noticia";
      protected $fillable = ['professor_id' ,'materia_id' , 'horario_id'];

      public function professor(){
            return $this->belongsTo("App\Professor");

      }

      public function materia(){
            return $this->belongsTo("App\Materia");
      }

      public function horario(){
            return $this->belongsTo("App\Horario");
      }

     
}
