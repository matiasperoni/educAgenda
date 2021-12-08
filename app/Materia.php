<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
      protected $table = "materia";
      protected $fillable = ['nome', 'descricao' , 'categoria_id'];

      public function categoria(){
            return $this->belongsTo("App\Categoria");
      }
}
